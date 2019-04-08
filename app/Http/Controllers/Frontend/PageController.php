<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page\Page;

class PageController extends Controller
{
    public function slug($slug)
    {
        return $this->render(Page::whereSlug($slug)->first());
    }

    public function id($id)
    {
        return $this->render(Page::first($id));
    }

    private function render(Page $page)
    {
        return view('frontend.'.$page->slug, [
            'page' => $page,
        ]);
    }
}
