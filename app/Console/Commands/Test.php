<?php

namespace App\Console\Commands;

use App\Models\Post\Post;
use App\Models\Post\Type\Field;
use Illuminate\Console\Command;

class Test extends Command
{
    protected $signature = 'test';

    public function handle()
    {
        $category = \App\Models\Category::whereSlug('system-articles')->whereIsRoot()->first();
        $items = $category->flatIndentMap();
        dd($items);

        $translate = \ShaoZeMing\LaravelTranslate\Facade\Translate::translate('你好');
        dd($translate);
        dd(is_callable([Field::class,'configure']), ['a','b']);

        $data = [
            'label'   => ['name' => 'Keywords',],
            'input'   => [
                'name'       => 'keywords',
                'attributes' => ['class' => 'form-control', 'required' => true,],
            ],
            'wrapper' => [
                'all'   => ['class' => 'form-group'],
                'input' => []
            ]
        ];
        echo json_encode($data);
        exit;

        $result = Post::find(2)->setMeta('items', [1, 2, 3, 4, 5]);
        dd(Post::find(2)->getMeta('items'));
    }
}
