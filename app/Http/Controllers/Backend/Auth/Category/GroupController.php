<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return view('backend.category.group.index', [
            'roots' => Category::whereIsRoot()->get(),
        ]);
    }

    public function create()
    {
        return view('backend.category.group.create');
    }

    public function store(Request $request, Category $category)
    {
        $params = $request->only(['name', 'slug', 'description']);
        if ($category->create($params)) {
            return redirect()->route('admin.category.group.index');
        }
    }

    public function edit(Category $category)
    {
        return view('backend.category.group.edit', [
            'category' => $category,
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $params = $request->only(['name', 'slug', 'description']);
        if ($category->update($params)) {
            return redirect()->route('admin.category.group.index');
        }
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.group.index');
    }
}
