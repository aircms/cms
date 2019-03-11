<?php

use App\Models\Page\Page;
use Illuminate\Support\Arr;
use App\Models\Page\Fragment;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    use TruncateTable;

    public function run()
    {
        $this->truncateMultiple([
            'fragments',
            'pages',
        ]);

        $fragments = [
            [
                'name' => 'Footer',
                'slug' => 'footer',
                'description' => 'common footer ',
                'file' => 'footer.fragment.yaml',
            ],
            [
                'name' => 'Header',
                'slug' => 'header',
                'description' => 'common header ',
                'file' => 'header.fragment.yaml',
            ],
            [
                'name' => 'Navbar',
                'slug' => 'navbar',
                'description' => 'common navbar ',
                'file' => 'navbar.fragment.yaml',
            ],
        ];
        $pages = [
            [
                'name' => 'Single Column Layout',
                'slug' => 'single-column-layout',
                'description' => 'Single Column Layout',
                'file' => 'layout-single-col.page.yaml',
            ],
            [
                'name' => 'Double Column Layout',
                'slug' => 'double-column-layout',
                'description' => 'Double Column Layout',
                'file' => 'layout-two-col.page.yaml',
            ],
        ];

        collect($fragments)->each(function ($item) {
            $file = Arr::get($item, 'file');
            Arr::forget($item, 'file');

            $item['code'] = file_get_contents(storage_path('resource/'.$file));
            Fragment::create($item);
        });

        collect($pages)->each(function ($item) {
            $file = Arr::get($item, 'file');
            Arr::forget($item, 'file');

            $item['code'] = file_get_contents(storage_path('resource/'.$file));
            Page::create($item);
        });

        Fragment::generateAll();
        Page::generateAll();
    }
}
