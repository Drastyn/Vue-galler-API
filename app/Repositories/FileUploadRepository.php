<?php

namespace App\Repositories;

use App\Models\FileUpload;

class FileUploadRepository {

    function getFiles() {
        $filesUpload = FileUpload::filesData();
        return $filesUpload->simplePaginate(8, ['*'], 'pagina');
    }

    function saveFile($request) {
        $name = $request->get('name');
        $file_name = time().'_'.$request->file;
        $file_token = md5($file_name);
        $file_path = $request->file('file')->storeAs('uploads', $file_token, 'public');
        $fileUpload = FileUpload::create([
            'name' => $name,
            'name_file' => $file_name,
            'path' => '/storage/' . $file_path,
            'token' => $file_token,
        ]);
        return $fileUpload;
    }

    function getFile($token) {
        return FileUpload::fileData($token);
    }

}