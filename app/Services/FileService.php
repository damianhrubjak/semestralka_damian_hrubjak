<?php

namespace App\Services;

use App\Models\File;
use App\Models\FileExtension;
use Error;
use Illuminate\Contracts\Cache\Store;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class FileService
{

    /**
     * 
     * Stores file into specific folder in laravel filesystem
     * 
     * @param fileToBeUploaded Illuminate\Http\UploadedFile
     * @param folderToStore folder name to strore file
     * @param foreignKeyCollumn name of FK collumn to create relation to master
     * @param foreignKeyId collumn name ID to create relation to master
     * @param fileName default = ""
     * @param thumbnail default = true, whether generate thumbnail or not
     * @param thumbnailDimensions dimensions of thumbnail [width, height], defult = = [600, 600 * 0.5625]
     * @param thumbnailQuality default = 70
     *      
     * !folder $folderToStore is created in storage/app/..
     * @return File returns File Model on success 
     */
    public function storeFile($fileToBeUploaded, $folderToStore, $foreignKeyCollumn, $foreignKeyId,  $fileName = "", $thumbnail = true, $thumbnailDimensions = [600, 600 * 0.5625], $thumbnailQuality = 70)
    {
        // returns absolute path to folder, including c:/.../laravel/storage/app/ etc.
        $fullFolder = Storage::path($folderToStore);
        $extension = strtolower($fileToBeUploaded->getClientOriginalExtension());
        $fileData = [
            $foreignKeyCollumn => $foreignKeyId,
            'name' => $fileToBeUploaded->getClientOriginalName(),
            'file_name' => empty($fileName) ? $this->fileNameHash($extension) : $fileName,
            'extension' => $extension,
            'mime_type' => $fileToBeUploaded->getMimeType(),
            'size' => $fileToBeUploaded->getSize(),
        ];

        $fileToBeUploaded->storeAs(
            $folderToStore,
            $fileData['file_name']
        );

        // 16 => 9 ratio = 0.5625
        // 9 => 16 ratio = 1.77777778
        if ($thumbnail && in_array($extension, FileExtension::returnMimesAsArray()['image'])) {
            $make =  $fullFolder . $fileData['file_name'];
            $save =  $fullFolder . "thumbnail_" . $fileData['file_name'];
            Image::make($make)->resize($thumbnailDimensions[0], $thumbnailDimensions[1], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($save, $thumbnailQuality);
        }

        return File::create($fileData);
        // try {
        // } catch (\Exception $e) {
        //     throw $e;
        // }
    }

    public function fileNameHash($extension)
    {
        return generateRandomString(15) . "." . $extension;
    }

    /**
     * 
     * returns file available for url
     * 
     * @param fileModel model of file to be deleted
     * @param folderName folder where is file stored
     * @param thumbnail bool - whether file to be served is thumbnail
     * 
     * @return response
     */
    public function serveFileForUrl($fileModel, $folderName, $thumbnail = true)
    {
        // if set to serve thumbnail image, but the file is not image

        if ($thumbnail && !in_array($fileModel->extension, FileExtension::returnMimesAsArray()['image'])) {
            return abort(400);
        }

        $fileName = $thumbnail ? "thumbnail_" . $fileModel->file_name  : $fileModel->file_name;

        $fullPathToFile = Storage::path($folderName . $fileName);

        if (file_exists($fullPathToFile)) {
            return $this->downloadResponse($fullPathToFile);
        } else {
            return abort(404);
        }
    }

    /**
     * 
     * downloads file
     * 
     * @param fileModel model of file to be deleted
     * @param folderName folder where is file stored
     * @param thumbnail bool - whether file to be downloaded is thumbnail
     * 
     * @return response
     */
    public function downloadFile($fileModel, $folderName, $thumbnail = true)
    {

        if ($thumbnail && !in_array($fileModel->extension, FileExtension::returnMimesAsArray()['image'])) {
            return abort(400);
        }

        $fileName = $thumbnail ? "thumbnail_" . $fileModel->file_name : $fileModel->file_name;

        $headers = array(
            "Content-Disposition" => "attachment; file_name=" . $fileModel->name,
            "Pragma" => "no-cache",
            'Content-Type' => $fileModel->mime_type,
            "Content-Transfer-Encoding" => "Binary",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $fullPathToFile = Storage::path($folderName . $fileName);

        if (file_exists($fullPathToFile)) {
            return $this->downloadResponse($fullPathToFile, $fileModel->name, $headers, 'attachment');
        } else {
            return abort(404);
        }
    }

    private function downloadResponse($path, $nameOfFile = null, $headers = [], $contentDisposition = null)
    {
        return response()->download($path, $nameOfFile, $headers, $contentDisposition);
    }

    /**
     * 
     * Deletes file based on Model, also deletes generated thumbnails
     * 
     * @param fileModel model of file to be deleted
     * @param folderName folder where is file stored
     * 
     * @return bool true on success, false on failure
     */
    public function deleteFile($fileModel, $folderName)
    {
        $successfulDelete = false;
        $file = Storage::path($folderName . $fileModel->file_name);
        if (in_array($fileModel->extension, FileExtension::returnMimesAsArray()['image'])) {
            $fileThumbnail = Storage::path($folderName . "thumbnail_" . $fileModel->file_name);
        }

        if (file_exists($file)) {
            if (unlink($file)) {
                $successfulDelete = true;
            } else {
                throw new \Exception('Can not delete File ' . $fileModel->file_name);
            }
        }

        if (file_exists($fileThumbnail)) {
            unlink($fileThumbnail);
        }

        try {
            if ($successfulDelete) {
                $fileModel->delete();
            }

            return $successfulDelete;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
