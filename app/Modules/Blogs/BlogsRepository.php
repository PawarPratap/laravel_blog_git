<?php

declare(strict_types=1);

namespace App\Modules\Blogs;
use App\Models\Blogs;

class BlogsRepository 
{
    const RECENT_BLOGS_LIMIT = 5;
    public function getTotalCount(): int
    {
        return Blogs::all()->count();
    }

    public function UIList(int $page, int $pageLength, array $filters = []): array
    {
        if($filters !== []) {
            return Blogs::with(["tags"])
                ->where($filters)
                ->where("id", ">", 0)
                ->limit($pageLength)
                ->offset(($page - 1) * $pageLength) // offset starts from 0 so we need page -1 
                ->get()
                ->toArray();
        }

        return Blogs::with(["tags"])
        ->where("id", ">", 0)
        ->limit($pageLength)
        ->offset(($page - 1) * $pageLength) 
        ->get()
        ->toArray();
    }

    public function UIListRecent(): array
    {
        return Blogs::with(["tags"])
        ->where("id", ">", 0)
        ->orderBy("created_at", "desc")
        ->limit(self::RECENT_BLOGS_LIMIT)
        ->get()
        ->toArray();
    }

}