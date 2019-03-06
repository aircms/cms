<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Content;
use App\Models\Post\Post;
use App\Models\Post\Type\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Type $type)
    {
        return view('backend.post.index', [
            'type'  => $type,
            'posts' => $type->posts()->orderDesc()->paginate(),
        ]);
    }

    public function create(Type $type)
    {
        return view('backend.post.create', [
            'type'   => $type,
        ]);
    }

    public function store(Type $type, Post $post, Request $request)
    {
        DB::beginTransaction();
        try {
            $fillable = ['title', 'slug', 'order'];
            $post->fill($request->only($fillable));

            $post->type_id = $type->id;
            if (!$post->save()) {
                throw new \Exception("post save fail");
            }

            $modifier = $request->get('modifier');
            foreach ($modifier as $key => $value) {
                switch ($key) {
                    case "tag":
                        $fieldValue = $request->get($value);
                        $value = strtr($fieldValue, [
                            '、' => ',',
                            '，' => ',',
                            '。' => ',',
                            ';' => ',',
                            '|' => ',',
                        ]);
                        $tags = collect(explode(',', $value))->filter()->map(function ($item) {
                            return trim($item);
                        })->unique()->all();
                        $post->tag($tags);
                        break;
                }
            }

            $fillable = array_merge($fillable, ['_token', 'modifier']);
            $post->syncMeta($request->except($fillable));

            DB::commit();
            return redirect()->route('admin.post.index', $type->id);
        } catch (\Exception $exception) {
            DB::rollback();
            report($exception);
        }

    }

    public function edit(Type $type, Post $post)
    {
        return view('backend.post.edit', [
            'type' => $type,
            'post' => $post,
        ]);
    }

    public function update(Type $type, Post $post, Request $request)
    {
        DB::beginTransaction();
        try {
            $fillable = ['title', 'slug', 'order'];
            $post->fill($request->only($fillable));

            if (!$post->save()) {
                throw new \Exception("post save fail");
            }

            $modifier = $request->get('modifier');
            foreach ($modifier as $key => $value) {
                switch ($key) {
                    case "tag":
                        $fieldValue = $request->get($value);
                        $value = strtr($fieldValue, [
                            '、' => ',',
                            '，' => ',',
                            '。' => ',',
                            '|' => ',',
                            ';' => ',',
                        ]);
                        $tags = collect(explode(',', $value))->filter()->map(function ($item) {
                            return trim($item);
                        })->unique()->all();
                        $post->retag($tags);
                        break;
                }
            }

            $fillable = array_merge($fillable, ['_token'], array_keys($modifier));
            $post->syncMeta($request->except($fillable));

            DB::commit();
            return redirect()->route('admin.post.index', $type->id);
        } catch (\Exception $exception) {
            DB::rollback();
            report($exception);
        }
    }

    public function delete(Type $type, Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index', $type->id);
    }
}
