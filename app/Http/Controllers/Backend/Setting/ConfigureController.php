<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ConfigureController extends Controller
{
    public function category(Category $category, Request $request)
    {
        return view('backend.setting.configure', [
            'category' => $category,
        ]);
    }
}
