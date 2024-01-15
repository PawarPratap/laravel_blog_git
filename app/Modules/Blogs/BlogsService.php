<?php

declare(strict_types=1);

namespace App\Modules\Blogs;

class BlogsService 
{
    public function __construct(
        private readonly BlogsRepository $repository
    ) {

    }

    public function getTotalCount(): int
    {
        return $this->repository->getTotalCount();
    }

    public function UIList(int $page, int $pageLength, array $filters = []): array
    {
        return $this->repository->UIList($page, $pageLength, $filters);
    }

    public function UIListRecent(): array
    {
        return $this->repository->UIListRecent();
    }
}