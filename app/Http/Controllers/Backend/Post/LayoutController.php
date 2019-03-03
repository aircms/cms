<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Type\Layout;
use App\Models\Post\Type\Type;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index(Type $type)
    {
        return view('backend.post.layout.index', [
            'type'   => $type,
            'layout' => $type->layout,
        ]);
    }

    public function store(Type $type, Layout $layout, Request $request)
    {
        $params = $request->only(['layout']);
        if ($layout->save($params)) {
            return redirect()->route('admin.post.layout.index', $type->id);
        }
    }

    public function preview(Type $type, Layout $layout, Request $request)
    {
        $params = $request->only(['layout']);
        if ($layout->save($params)) {
            return redirect()->route('admin.post.layout.index', $type->id);
        }
    }

}
