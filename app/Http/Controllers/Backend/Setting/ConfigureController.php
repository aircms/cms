<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SettingItem;
use Illuminate\Http\Request;

class ConfigureController extends Controller
{
    public function index()
    {
        return view('backend.setting.index', [
            'items' => SettingItem::all(),
        ]);
    }

    public function create()
    {
        return view('backend.configure.create');
    }

    public function store(SettingItem $item)
    {
        return redirect()->route("admin.setting.configure.index");
    }

    public function edit(SettingItem $item)
    {
        return redirect()->route("admin.setting.configure.index");
    }

    public function update(SettingItem $item)
    {
        return view('backend.setting.update', [
            'item' => $item,
        ]);
    }

    public function delete(SettingItem $item)
    {
        $item->delete();
        return redirect()->route("admin.setting.configure.index");
    }

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
