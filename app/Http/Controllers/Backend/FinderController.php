<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\FileTypeDetector;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class FinderController extends Controller
{

    use FileTypeDetector;

    public function dir(Request $request)
    {
        $storagePath = storage_path("app/public");
        $dir = realpath($storagePath . "/" . ltrim($request->get("d", "/"), "/"));
        if (!Str::startsWith($dir, $storagePath)) {
            $dir = $storagePath;
        }
        $finder = Finder::create()->depth(0)->in($dir)->sortByType();
        $storagePathLen = strlen($storagePath);

        $files = [];
        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            $fileType = $this->detectFileType($file);
            $files[] = [
                'name' => $file->getBasename(),
                'path' => Str::substr($file->getRealPath(), $storagePathLen),
                'type' => $file->isDir() ? "folder" : $fileType,
                'mode' => $file->isDir() ? "open" : $this->detectFileMode($fileType),
                'extension' => $file->getExtension(),
            ];
        }

        // retrive bread crumbs
        $breadcrumbItems = array_filter(explode("/", Str::substr($dir, $storagePathLen)));
        $breadcrumbs = [];

        $breadcrumbTree = [];
        foreach ($breadcrumbItems as $breadcrumb) {
            $breadcrumbTree[] = $breadcrumb;

            $breadcrumbs[] = [
                'title' => $breadcrumb,
                'path' => "/" . implode("/", $breadcrumbTree),
            ];
        }

        return view('backend.finder.dir', [
            'breadcrumbs' => $breadcrumbs,
            'files' => $files,
        ]);
    }

    public function download()
    {

    }
    public function show()
    {

    }

    public function delete()
    {

    }
}
