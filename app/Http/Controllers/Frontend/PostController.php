<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;

class PostController extends Controller
{
    public function slug($slug)
    {
        return $this->render(Post::whereSlug($slug)->first());
    }

    public function id($id)
    {
        return $this->render(Post::first($id));
    }

    private function render(Post $post)
    {
        $viewPath = 'frontend.post.default';
        if ($post->hasMeta('layout')) {
            $viewPath = 'frontend.post'.$post->getMeta('layout', 'default');
        }

        return view($viewPath, ['post' => $post]);
    }
}
