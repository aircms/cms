<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Type\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function index()
    {
        return view('backend.post.field.index', [
            'fields' => Field::ordered()->get()
        ]);
    }

    public function create()
    {
        return view('backend.post.field.create');
    }

    public function store(Field $field, Request $request)
    {
        if ($field->fill($request->all())->save()) {
            $field->setMeta("configure", \GuzzleHttp\json_decode($request->configure, true));

            return redirect()->route('admin.post.field.index');
        }
    }

    public function edit(Field $field)
    {
        return view('backend.post.field.edit', [
            'field' => $field,
        ]);
    }

    public function update(Field $field, Request $request)
    {
        if ($field->fill($request->all())->save()) {
            $field->setMeta("configure", \GuzzleHttp\json_decode($request->configure, true));

            return redirect()->route('admin.post.field.index');
        }
    }

    public function delete(Field $field)
    {
        $field->delete();
        return redirect()->route('admin.post.field.index');
    }

    public function up(Field $field)
    {
        $field->moveOrderUp();
        return redirect()->route('admin.post.field.index');
    }

    public function down(Field $field)
    {
        $field->moveOrderDown();
        return redirect()->route('admin.post.field.index');
    }

    public function demo($name)
    {
        return [
            'obj'    => config("post.fields.{$name}", []),
            'string' => \GuzzleHttp\json_encode(config("post.fields.{$name}", []), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        ];
    }
}

