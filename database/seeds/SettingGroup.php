<?php

use Illuminate\Database\Seeder;

class SettingGroup extends Seeder
{
    use TruncateTable;

    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();

        $this->truncateMultiple([
            'jobs',
            'groups',
            'group_items',
        ]);


        factory(\aircms\groupable\Models\Group::class, 2)->create()->each(function ($groupItem) {
            factory(\aircms\settings\Models\Setting::class, 10)->create()->each(function (\aircms\settings\Models\Setting $settingItem) use ($groupItem) {
                $settingItem->linkGroup($groupItem);
            });
        });

        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
