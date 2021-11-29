<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Services\FileService;

class FileController extends Controller
{
    public function showFile(File $file)
    {
        return (new FileService())->serveFileForUrl($file, $file->folder_name);
    }

    public function showFileFullResolution(File $file)
    {
        return (new FileService())->serveFileForUrl($file, $file->folder_name, false);
    }

    public function downloadFile(File $file)
    {
        return (new FileService())->downloadFile($file, $file->folder_name, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        (new FileService())->deleteFile($file, $file->getFolderName());
        return redirect()->back();
    }
}
