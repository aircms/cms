<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\Page\Fragment;
use App\Models\YAML2Blade\Parser;
use Illuminate\Http\Request;

class FragmentController extends Controller
{
    public function __construct()
    {
        Request::macro("tags", function () {
            $modifier = $this->get('tag');
            $value = strtr($modifier, ['、' => ',', '，' => ',', '。' => ',', ';' => ',', '|' => ',']);
            return collect(explode(',', $value))->filter()->map(function ($item) {
                return trim($item);
            })->unique()->all();
        });
    }

    public function index()
    {
        return view('backend.fragment.index');
    }

    public function create()
    {
        return view('backend.fragment.create', [
            'fragment' => new Fragment(),
        ]);
    }

    public function store(Fragment $fragment, Request $request)
    {
        if ($fragment->fill($request->all())->save()) {
            $fragment->tag($request->tags());

            $bladeFile = storage_path("framework/cache/views/fragment/{$fragment->slug}");
            Parser::parse2File($fragment->code, $bladeFile);

            return redirect()->route('admin.pages.fragment.index');
        }
    }

    public function edit(Fragment $fragment)
    {
        return view('backend.fragment.edit', [
            'fragment' => $fragment,
        ]);
    }

    public function update(Fragment $fragment, Request $request)
    {
        if ($fragment->fill($request->all())->save()) {
            $fragment->retag($request->tags());

            $bladeFile = storage_path("framework/cache/views/fragment/{$fragment->slug}");
            Parser::parse2File($fragment->code, $bladeFile);

            return redirect()->route('admin.pages.fragment.index');
        }
    }

    public function delete(Fragment $fragment)
    {
        $fragment->delete();
        $bladeFile = storage_path("framework/cache/views/fragment/{$fragment->slug}");
        unlink($bladeFile);

        return redirect()->route('admin.pages.fragment.index');
    }
}
