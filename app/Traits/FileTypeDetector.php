<?php

namespace App\Traits;

use Symfony\Component\Finder\SplFileInfo;

trait FileTypeDetector
{
    public function detectFileMode($fileType)
    {
        switch ($fileType) {
            case "file-image":
            case "file-pdf":
                return "open";
        }
        return "download";
    }

    public function detectFileType(SplFileInfo $fileInfo)
    {
        $fileClass = ["file"];
        switch (strtolower($fileInfo->getExtension())) {
            case "doc":
            case "docx":
                $fileClass[] = "word";
                break;
            case "xls":
            case "xlt":
            case "xlsm":
            case "xlsb":
            case "xltx":
            case "csv":
            case "xlsx":
                $fileClass[] = "excel";
                break;
            case "ppt":
            case "pptx":
                $fileClass[] = "powerpoint";
                break;
            case "pdf":
                $fileClass[] = "pdf";
                break;
            case "mp4":
            case "avi":
            case "mp3":
            case "mpeg":
            case "rm":
            case "rmvb":
            case "mov":
            case "wmv":
            case "asf":
            case "flv":
            case "mkv":
                $fileClass[] = "video";
                break;
            case "bmp":
            case "jpg":
            case "jpeg":
            case "gif":
            case "png":
                $fileClass[] = "image";
                break;
            case "php":
            case "txt":
            case "js":
            case "ts":
            case "go":
            case "html":
            case "htm":
            case "py":
            case "pl":
            case "java":
            case "json":
                $fileClass[] = "code";
                break;
            case "json":
                $fileClass[] = "code";
                break;
        }
        return implode("-", $fileClass);
    }
}
