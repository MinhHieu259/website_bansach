<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index() {
        $categories = $this->categoryService->findAll();
        return view('components.admin.categories.index', compact('categories'));
    }

    public function create() {
        return view('components.admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $this->categoryService->save(($data));
        return redirect()->route('admin.categories');
    }

    public function show(Category $category) {
        return view('components.admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('admin.categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories');
    }

}
