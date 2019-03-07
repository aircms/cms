<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\Page\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('backend.page.index');
    }

    public function create()
    {
        return view('backend.page.create');
    }

    public function store(Page $page, Request $request)
    {
        if ($page->fill($request->all())->save()) {
            return redirect()->route('admin.pages.page.index');
        }
    }
}
