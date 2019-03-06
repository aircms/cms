<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Type\Type;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

class LayoutController extends Controller
{
    public function index(Type $type)
    {
        return view('backend.post.layout.index', [
            'type'   => $type,
            'layout' => Yaml::dump($type->getMeta('layout', []), 10, 2),
        ]);
    }

    public function store(Type $type, Request $request)
    {
        $type->setMeta("layout", Yaml::parse($request->layout));
        return redirect()->route('admin.post.layout.index', $type->id);
    }
}
