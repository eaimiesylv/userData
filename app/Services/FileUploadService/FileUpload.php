<?php
namespace App\Services\FileUploadService;


class FileUpload{


    public function uploadFile($file)
    {
        
        return isset($file) ? $file->store('profile_images', 'public') : '';

    }


}


?>