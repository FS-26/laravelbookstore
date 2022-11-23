<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class Helper
{

    /**
     * uploadFile function to handle the uploaded file from forms
     *
     * @param Request $request : Http request
     * @param string $name : input name in the form
     * @param string $fileName : the name we want to give the file without extension
     * @param string $path : file path
     * @return string|null : the path of the upload file or null if there is not
     */
    public static function uploadFile(Request $request, $name, $fileName, $path = "uploads")
    {
        if ($request->hasFile("$name")) {
            $file = $request->file($name);
            $filePath = $request->file($name)->storeAs("$path", $fileName . '.' . $file->getClientOriginalExtension(), 'public');
            return 'storage/' . $filePath;
        } else {
            return null;
        }
    }
}