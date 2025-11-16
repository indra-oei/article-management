<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public function findAll(): Collection
    {
        return Category::orderBy('name', 'asc')->get();
    }
    
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(int $id, array $data): Category
    {
        $category = Category::findOrFail($id);
        $category->update($data);

        return $category;
    }

    public function delete(int $id): bool
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
}
