<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Type\Layout;
use App\Models\Post\Type\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('backend.post.type.index', [
            'types' => Type::ordered()->get(),
        ]);
    }

    public function create()
    {
        return view('backend.post.type.create');
    }

    public function store(Type $type,Request $request)
    {
        $params = $request->only(['name', 'slug', 'description']);
        if ($type->fill($params)->save()) {
            $type->layout()->save(new Layout());
            return redirect()->route('admin.post.type.index');
        }
    }

    public function edit(Type $type)
    {
        return view('backend.post.type.edit', [
            'type' => $type,
        ]);
    }

    public function update(Type $type, Request $request)
    {
        $params = $request->only(['name', 'slug', 'description']);
        if ($type->update($params)) {
            return redirect()->route('admin.post.type.index');
        }
    }

    public function delete(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.post.type.index');
    }

    public function up(Type $type)
    {
        $type->moveOrderUp();
        return redirect()->route('admin.post.type.index');
    }

    public function down(Type $type)
    {
        $type->moveOrderDown();
        return redirect()->route('admin.post.type.index');
    }
}
