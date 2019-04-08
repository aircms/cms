<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SettingItem;
use Illuminate\Http\Request;

class ConfigureController extends Controller
{
    public function category(Category $category, Request $request)
    {
        return view('backend.setting.configure', [
            'category' => $category,
            'items'    => $category->entries(SettingItem::class)->get(),
        ]);
    }

    public function save(Category $category, Request $request)
    {
        foreach ($request->except('_token') as $slug => $value) {
            SettingItem::whereSlug($slug)->first()->setMeta('value', $value);
        }

        return redirect()->route("admin.setting.configure.category", $category->id);
    }
}
