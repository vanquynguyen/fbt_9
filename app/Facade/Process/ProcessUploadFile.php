<?php
namespace App\Facade\Process;

class ProcessUploadFile
{
    public function upload($file, $folderName)
    {
        //upload file

        if (!$file) {
            $filename = config('custom.defaultAvatar');
        } else {
            $filename = $file->getClientOriginalName();
            $file->move($folderName, $filename);
        }

        return $filename;
    }
}
