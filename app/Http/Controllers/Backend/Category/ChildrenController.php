<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    public function index(Category $ancestor)
    {
        return view('backend.category.children.index', [
            'ancestor' => $ancestor,
            'children' => $ancestor->descendants()->get(),
        ]);
    }

    public function create(Category $ancestor)
    {
        return view('backend.category.children.create', [
            'ancestor' => $ancestor,
            'parent'   => $ancestor,
        ]);
    }

    public function store(Request $request, Category $ancestor)
    {
        $category = new Category();

        $params = $request->only(['name', 'slug', 'description']);
        if ($category->fill($params)->save()) {
            $ancestor->appendNode($category);

            return redirect()->route('admin.category.children.index', $ancestor->id);
        }
    }

    public function child(Category $ancestor, Category $parent)
    {
        return view('backend.category.children.create', [
            'ancestor' => $ancestor,
            'parent'   => $parent,
        ]);
    }

    public function storeChild(Request $request, Category $ancestor, Category $parent)
    {
        $category = new Category();

        $params = $request->only(['name', 'slug', 'description']);
        if ($category->fill($params)->save()) {
            $parent->appendNode($category);

            return redirect()->route('admin.category.children.index', $ancestor->id);
        }
    }

    public function update(Category $ancestor, Category $category)
    {
        return view('backend.category.children.update', [
            'category' => $category,
            'ancestor' => $ancestor,
        ]);
    }

    public function edit(Category $category, Request $request)
    {
        $params = $request->only(['name', 'slug', 'description']);
        if ($category->update($params)) {
            return redirect()->route('admin.category.children.index', $category->parent_id);
        }
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.children.index', $category->parent_id);
    }
}
