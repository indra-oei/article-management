<?php

namespace App\Livewire\Admin\Category;

use App\Services\CategoryService;
use Livewire\Component;

class CategoryTable extends Component
{
    protected CategoryService $categoryService;
    protected $listeners = [
        'refresh-table' => '$refresh'
    ];

    public function boot(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getCategoriesProperty(): array
    {
        return $this->categoryService->findAll()->toArray();
    }

    public function deleteCategory(int $id): void
    {
        $this->categoryService->delete($id);
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.admin.category.category-table', [
            'headers' => [
                'name' => 'Name'
            ],
            'rows' => $this->categories
        ]);
    }
}
