<?php 

declare(strict_type=1);

Namespace App\Modules\Users;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersDatatableRepository
{
    protected string $table = "users";
    protected array $orderColumns = [
        "id",
        "name",
        "email"
    ];
    protected array $searchColumns = [
        "name",
        "email"
    ];
    protected array $selectColumns = [
        "users.id",
        "users.name",
        "users.email"
    ];
    protected array $exceptionColumns = [
        "id" => "users.id",
        "name" => "users.name",
        "email" => "users.email",
    ];
    protected string $joinQuery = "";
    protected string $where = "users.id > 0";
    public function index(
        array $columns,
        int $start,
        int $length,
        array $order,
        array $search
    ): array
    {
        $query = $this->buildSQL($columns, $start, $length, $order, $search);
        $orderQuery = $this->buildOrderByQuery($columns, $order);

        $result = json_decode(json_encode(DB::select($query["sql"], $query["bindings"])), true);
        return [
            "recordsFiltered" => json_decode(json_encode(DB::selectOne($query["countSql"], $query["bindings"])), true)["total"],
            "recordsTotal" => User::count(),
            "data" => $result
        ];
    }

    private function buildSQL(
        array $columns,
        int $start,
        int $length,
        array $order,
        array $search
    ): array {
        $selectColumns = implode(',', $this->selectColumns);
        $orderQuery = $this->buildOrderByQuery($columns, $order);
        $searchQueryObject = $this->buildSearchQuery($columns, $search);
        
        $whereQuery = ($this->where !== "")
        ? "WHERE $this->where"
        : "";

         if($searchQueryObject["sql"] !== "") {
            $whereQuery = "$whereQuery AND ({$searchQueryObject['sql']})";
        } 

        return [
            "sql" => "SELECT $selectColumns
            FROM $this->table
            $whereQuery
            $orderQuery
            LIMIT $length OFFSET $start",
            "countSql" => "SELECT COUNT(id) as total
            FROM $this->table
            $whereQuery
            LIMIT $length OFFSET $start",
            "bindings" => $searchQueryObject["bindings"]
        ];
    }

    private function buildOrderByQuery(array $columnList, array $orderList): string
    {
        //dd($columnList,$orderList);
        $orderByQueryList =[];
        foreach($orderList as $toOrderElement) {
            $orderBy = $toOrderElement["dir"];

            if($columnList[$toOrderElement["column"]]["orderable"] === true) {
                $columnName = $columnList[$toOrderElement["column"]]["data"];
                if(in_array($columnName, $this->orderColumns)) {
                    $orderByQueryList[] = "{$this->exceptionColumns[$columnName]} $orderBy";
                }
            }
        }

            if(count($orderByQueryList) > 0) {
                return "ORDER BY " . implode(",", $orderByQueryList);
            }

            return "";
    }

    private function buildSearchQuery(array $columnsList, array $searchList): array 
    {
        $bindingList =[];
        $queryList =[];

        $searchValue = $searchList["value"];

        foreach($columnsList as $column) {
            $columnName = $column["data"];

            if(in_array($columnName, $this->searchColumns)) {
                $queryList[] = "{$this->exceptionColumns[$columnName]} LIKE ?";
                $bindingList[] = "%$searchValue%";
            }
        }
        return [
            "sql" => implode(" OR ", $queryList),
            "bindings" => $bindingList
        ];
    }
}