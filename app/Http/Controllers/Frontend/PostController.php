<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page\Page;
use App\Models\Post\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $viewPath = 'frontend.post';

        if (Page::exists("frontend.post-{$post->slug}")) {
            $viewPath = "frontend.post-{$post->slug}";
        } elseif ($post->hasMeta('layout')) {
            $viewPath = 'frontend.' . $post->getMeta('layout', 'post');
        }

        return view($viewPath, ['post' => $post]);
    }
}
