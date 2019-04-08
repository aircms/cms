<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\SettingItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        \Illuminate\Support\Facades\Request::macro("getItems", function () {
            if (in_array($this->type, ['single', 'multi'])) {
                $items = explode("\n", $this->items);
                return collect($items)->filter()->flatMap(function ($item) {
                    list($key, $value) = explode(":", $item);
                    return [trim($key) => trim($value)];
                })->all();
            }

            return [];
        });
    }

    public function index()
    {
        return view('backend.setting.index', [
            'items' => SettingItem::ordered()->get(),
        ]);
    }

    public function create()
    {
        return view('backend.setting.create');
    }

    public function store(SettingItem $item, Request $request)
    {
        if ($item->fill($request->all())->save()) {
            $item->setMeta('items', $request->getItems());
            $item->attachCategories([$request->group]);

            return redirect()->route("admin.setting.item.index");
        }
    }

    public function edit(SettingItem $item)
    {
        return view('backend.setting.edit', [
            'item' => $item,
        ]);
    }

    public function update(SettingItem $item, Request $request)
    {
        if ($item->fill($request->all())->save()) {
            $item->setMeta('items', $request->getItems());
            $item->attachCategories([$request->group]);

            return redirect()->route("admin.setting.item.index");
        }
    }

    public function delete(SettingItem $item)
    {
        $item->purgeMeta();
        $item->detachCategories();
        $item->delete();
        return redirect()->route("admin.setting.configure.index");
    }

    public function up(SettingItem $item)
    {
        $item->moveOrderUp();

        $groupIds = (new SettingItem())->withAnyCategories($item->categories)->get()->pluck('id');
        SettingItem::setNewOrder($groupIds, intval($item->categories()->first()->id . "000"));
        return redirect()->route("admin.setting.item.index");
    }

    public function down(SettingItem $item)
    {
        $item->moveOrderDown();

        $groupIds = (new SettingItem())->withAnyCategories($item->categories)->get()->pluck('id');
        SettingItem::setNewOrder($groupIds, intval($item->categories()->first()->id . "000"));
        return redirect()->route("admin.setting.item.index");
    }
}
