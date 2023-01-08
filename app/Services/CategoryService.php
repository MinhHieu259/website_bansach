<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    function findAll() {
        $categories = $this->category->get();
        if($categories) {
            return $categories;
        }
        return array();
    }

    function save($data)
    {
        try {
            $category = new Category();
            $category->name = $data['name'];
            $category->save();
            return true;
        } catch (\Throwable $e) {
            report($e);
            return false;
        }
    }
}
