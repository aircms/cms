<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use DisableForeignKeys;
    use TruncateTable;

    public function run()
    {
        $this->disableForeignKeys();
        $this->truncateMultiple([
            'categories',
            'categorizables',
        ]);
        $this->enableForeignKeys();

        $defaultCategories = [
            [
                'name'  => '系统文章', 'description' => '系统默认文章发布',
                'items' => [
                    [
                        'name'  => '新闻',
                        'items' => [
                            ['name' => '国内'],
                            ['name' => '国际'],
                        ]
                    ],
                    [
                        'name'  => '搞笑',
                        'items' => [
                            ['name' => '冷笑话'],
                            ['name' => '图片'],
                        ]
                    ],
                ]
            ],
            [
                'name'        => '系统设置',
                'description' => '系统设置管理',
                'items'       => [
                    ['name' => '全局', 'slug' => 'global', 'description' => '全局参数配置'],
                    ['name' => '支付', 'slug' => 'payment', 'description' => ''],
                    ['name' => '用户', 'slug' => 'user', 'description' => ''],
                    ['name' => '验证码', 'slug' => 'captcha', 'description' => ''],
                    ['name' => '联系方式', 'slug' => 'contact', 'description' => ''],
                    ['name' => '短信', 'slug' => 'sms', 'description' => ''],
                    ['name' => '邮件', 'slug' => 'email', 'description' => ''],
                    ['name' => '缓存', 'slug' => 'cache', 'description' => ''],
                    ['name' => '存储', 'slug' => 'storage', 'description' => ''],
                    ['name' => '微信公众号', 'slug' => 'wechat-mp', 'description' => ''],
                ]
            ],
        ];

        $this->addItem($defaultCategories);

    }

    public function addItem($items, \App\Models\Category $parnet = null)
    {
        foreach ($items as $item) {
            $subItems = [];
            if (isset($item['items'])) {
                $subItems = $item['items'];
                unset($item['items']);
            }

            $model = \App\Models\Category::create($item);
            if (!is_null($parnet)) {
                $parnet->appendNode($model);
            }

            if (count($subItems)) {
                $this->addItem($subItems, $model);
            }
        }
    }
}
