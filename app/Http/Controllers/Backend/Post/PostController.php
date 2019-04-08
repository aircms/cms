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
    public function __construct()
    {
        \Illuminate\Support\Facades\Request::macro('metaData', function () {
            $fillable = array_merge((new Post())->getFillable(), ['_token', 'modifier'], $this->get('modifier', []));
            return $this->except($fillable);
        });

        \Illuminate\Support\Facades\Request::macro('tagModifier', function ($field) {
            $modifier = $this->get($field);
            $value = strtr($modifier, ['、' => ',', '，' => ',', '。' => ',', ';' => ',', '|' => ',']);
            return collect(explode(',', $value))->filter()->map(function ($item) {
                return trim($item);
            })->unique()->all();
        });
    }

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
            'type' => $type,
        ]);
    }

    public function store(Type $type, Post $post, Request $request)
    {
        DB::beginTransaction();
        try {
            $post->type_id = $type->id;
            if (!$post->fill($request->all())->save()) {
                throw new \Exception("post save fail");
            }

            collect($request->modifier)->each(function ($field, $modifier) use ($request, $post) {
                $macroMethod = "{$modifier}Modifier";
                $post->{$modifier}($request->{$macroMethod}($field));
            });

            $post->syncMeta($request->metaData());

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
            if (!$post->fill($request->all())->save()) {
                throw new \Exception("post save fail");
            }

            collect($request->modifier)->each(function ($field, $modifier) use ($request, $post) {
                $macroMethod = "{$modifier}Modifier";
                $post->{$modifier}($request->{$macroMethod}($field));
            });

            $post->syncMeta($request->metaData());

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
