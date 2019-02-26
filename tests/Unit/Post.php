<?php

namespace Tests\Unit;

use App\Models\Post\Content;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Post extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function create()
    {
        $post = new \App\Models\Post\Post();
        $post->title = $this->faker->title;

        $this->assertTrue($post->save());
        $this->assertNotEmpty($post->slug);

        $post->content()->save(new Content([
            'content' => $this->faker->text,
        ]));

        $this->assertNotEmpty($post->content->content);
    }

    /** @test */
    public function softDelete()
    {
        $this->initTable();

        /** @var \App\Models\Post\Post $model */
        $model = \App\Models\Post\Post::find(2);

        $model->delete();

        \App\Models\Post\Post::all()->each(function (\App\Models\Post\Post $model) {
            $this->assertNotEquals(2, $model->id);
        });
    }

    /** @test */
    public function metaQuery()
    {
        $this->initTable();

        $model = \App\Models\Post\Post::whereMeta('post_id', 2)->first();

        $this->assertNotNull($model);

        $this->assertEquals(2, $model->id);

        $this->assertEquals(2, $model->getMeta('post_id'));
        $this->assertNotEmpty($model->getMeta('keyword'));
        $this->assertNotEmpty($model->getMeta('description'));
    }

    private function initTable()
    {
        factory(\App\Models\Post\Post::class, 10)->create()->each(function ($item) {
            $item->content()->save(factory(Content::class)->make());

            $item->setMeta("post_id", $item->id);
            $item->setMeta("keyword", $this->faker->text());
            $item->setMeta("description", $this->faker->text());
        });
    }
}
