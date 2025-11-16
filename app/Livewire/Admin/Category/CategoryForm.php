<?php

namespace App\Livewire\Admin\Category;

use App\Services\CategoryService;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CategoryForm extends Component
{
    public ?array $category = null;
    public string $name;

    protected $listeners = [
        'edit-category' => 'setCategory',
        'close-modal' => 'clearForm'
    ];

    protected function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('categories', 'name')->ignore($this->category['id'] ?? null)
            ]
        ];
    }

    public function setCategory(array $category)
    {
        $this->category = $category;

        $this->fill([
            'name' => $category['name'] ?? null
        ]);
    }

    public function submit(CategoryService $categoryService)
    {
        $this->validate($this->rules());

        $payload = [
            'name' => $this->name
        ];

        if ($this->category) {
            $categoryService->update($this->category['id'], $payload);

            $this->dispatch('toast', [
                'message' => 'Category updated',
                'type' => 'success'
            ]);
        } else {
            $categoryService->create($payload);

            $this->dispatch('toast', [
                'message' => 'Category created',
                'type' => 'success'
            ]);
        }

        $this->dispatch('hide-loading');
        $this->dispatch('close-modal');
        $this->dispatch('refresh-table')->to('admin.category.category-table');
    }

    public function clearForm()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.category.category-form');
    }
}
