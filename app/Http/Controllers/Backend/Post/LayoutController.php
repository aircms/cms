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
        $metaData = $type->getMeta('layout', []);
        $dumpYaml = Yaml::dump($metaData, 10, 2);
        $dumpYaml = preg_replace('/(-\s+)/m', '- $2', $dumpYaml);

        return view('backend.post.layout.index', [
            'type'   => $type,
            'layout' => $dumpYaml,
        ]);
    }

    public function store(Type $type, Request $request)
    {
        $type->setMeta("layout", Yaml::parse($request->layout));
        return redirect()->route('admin.post.layout.index', $type->id);
    }
}
