<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UploadeController extends Controller
{
    public function image(Request $request)
    {
        $files = [];
        collect($request->file('files'))->each(function (UploadedFile $file) use (&$files) {
            dump($file);
            $files[] = [
                'path' => $file->store('uploads'),
                'name' => $file->getClientOriginalName(),
            ];
        });

        return $files;
    }
}
