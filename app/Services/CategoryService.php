<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    protected CategoryRepository $categories;

    /**
     * Create a new class instance.
     */
    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function findAll(): Collection
    {
        return $this->categories->findAll();
    }

    public function create(array $data): Category
    {
        return $this->categories->create($data);
    }

    public function update(int $id, array $data): Category
    {
        return $this->categories->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->categories->delete($id);
    }
}
