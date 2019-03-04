<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use TruncateTable;

    public function run()
    {
        \App\Models\Category::all()->each(function ($item) {
            $item->delete();
        });

        factory(\App\Models\Category::class, 3)->create();
        for ($i = 0; $i < 10; $i++) {
            $category = \App\Models\Category::inRandomOrder()->first();
            factory(\App\Models\Category::class,2)->create()->each(function (\App\Models\Category $cat) use ($category) {
                $category->appendNode($cat);
            });
        }
    }
}
