<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page\Page;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $viewPath = 'frontend.category';
        if (Page::exists('category_' . $category->slug)) {
            $viewPath = 'frontend.category_' . $category->slug;
        }

        return view($viewPath, ['category' => $category]);
    }
}
