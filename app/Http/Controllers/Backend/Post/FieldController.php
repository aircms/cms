<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Type\Field;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

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
            $field->setMeta("configure", Yaml::parse($request->configure));

            return redirect()->route('admin.post.field.index');
        }
    }

    public function edit(Field $field)
    {
        $metaData = $field->getMeta('configure', []);
        $dumpYaml = Yaml::dump($metaData, 10, 2);
        $dumpYaml = preg_replace('/(-\s+)/m', '- $2', $dumpYaml);

        return view('backend.post.field.edit', [
            'field'     => $field,
            'configure' => $dumpYaml,
        ]);
    }

    public function update(Field $field, Request $request)
    {
        if ($field->fill($request->all())->save()) {
            $field->setMeta("configure", Yaml::parse($request->configure));

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
        $metaData = config("post.fields.{$name}", []);
        $dumpYaml = Yaml::dump($metaData, 10, 2);
        $dumpYaml = preg_replace('/(-\s+)/m', '- $2', $dumpYaml);

        return [
            'string' => $dumpYaml,
        ];
    }
}

