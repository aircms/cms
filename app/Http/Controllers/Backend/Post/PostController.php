<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use App\Models\Post\Type\Type;

class PostController extends Controller
{
    public function index(Type $type)
    {
        return view('backend.post.index', [
            'type'  => $type,
            'posts' => $type->posts()->paginate(),
        ]);
    }

    public function create(Type $type)
    {
        return view('backend.post.create', [
            'type' => $type,
        ]);
    }

    public function store(Type $type, Post $post)
    {
        return redirect()->route('admin.post.index', $type->id);
    }

    public function edit(Type $type, Post $post)
    {
        return view('backend.post.edit', [
            'type' => $type,
            'post' => $post,
        ]);
    }

    public function update(Type $type, Post $post)
    {
        return redirect()->route('admin.post.index', $type->id);
    }

    public function delete(Type $type, Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index', $type->id);
    }
}
