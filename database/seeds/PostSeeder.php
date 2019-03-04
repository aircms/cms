<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateMultiple([
            'post_types',
            'post_layouts',
            'post_contents',
            'posts',
        ]);

        factory(\App\Models\Post\Type\Type::class, 3)->create()->each(function (\App\Models\Post\Type\Type $type) {
            $type->posts()->saveMany(factory(\App\Models\Post\Post::class, 30)->create());

            $type->layout()->save(factory(\App\Models\Post\Type\Layout::class)->make());
        });
    }
}
