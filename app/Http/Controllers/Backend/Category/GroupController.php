<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Rinvex\Categories\Models\Category;

class GroupController extends Controller
{
    public function index(Category $category)
    {
        return view('backend.category.group.index', [
            'ancestors' => $category->ancestors(),
        ]);
    }
}
