<?php 

declare(strict_type=1);

Namespace App\Modules\Users;

use App\Modules\Users\UsersDatatableRepository;

class UsersService 
{
    public function __construct( 
        private readonly UsersDatatableRepository $datatableRepository
    ) 
    {

    }
    public function index(array $data): array
    {
      $result = $this->datatableRepository->index(
        $data["columns"],
        $data["start"],
        $data["length"],
        $data["order"],
        $data["search"],
      ); 

      $result["data"] = array_map(function ($row){
        $row["actions"] = "";
        return $row;
      }, $result["data"]);
      
      return $result;

    }
}