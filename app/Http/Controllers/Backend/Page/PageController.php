<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\Page\Page;
use App\Models\YAML2Blade\Parser;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('backend.page.index', [
            'pages' => Page::ordered()->get(),
        ]);
    }

    public function create()
    {
        return view('backend.page.create');
    }

    public function store(Page $page, Request $request)
    {
        if ($page->fill($request->all())->save()) {
            $bladeFile = storage_path("framework/cache/views/layout/{$page->slug}");
            Parser::parse2File($page->code, $bladeFile);

            return redirect()->route('admin.pages.page.index');
        }
    }

    public function edit(Page $page)
    {
        return view('backend.page.edit', [
            'page' => $page,
        ]);
    }

    public function update(Page $page, Request $request)
    {
        if ($page->fill($request->all())->save()) {
            $bladeFile = storage_path("framework/cache/views/layout/{$page->slug}");
            Parser::parse2File($page->code, $bladeFile);

            return redirect()->route('admin.pages.page.index');
        }
    }

    public function delete(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.page.index');
    }
}
