<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page\Page;

class PageController extends Controller
{
    public function index(Page $page)
    {
        return view('frontend.' . $page->slug, [
            'page' => $page,
        ]);
    }
}
