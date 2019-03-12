<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UploadeController extends Controller
{
    public function index(Request $request)
    {
        $files = [];
        collect($request->file('files'))->each(function (UploadedFile $file) use (&$files) {
            $files[] = [
                'path' => $file->store(today()->format('Y/m/d'), 'public'),
                'name' => $file->getClientOriginalName(),
            ];
        });

        return $files;
    }
}
