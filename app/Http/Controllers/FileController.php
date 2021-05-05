<?php

namespace App\Http\Controllers;

use App\Repositories\FileUploadRepository;
use App\Http\Requests\StoreFileUploadRequest;

class FileController extends Controller
{
    protected $fileUploadRepository;

    function __construct(FileUploadRepository $fileUploadRepository) {
        $this -> fileUploadRepository = $fileUploadRepository;
    }

    function index() {
        return $this -> fileUploadRepository -> getFiles();
    }

    function upload(StoreFileUploadRequest $request) {
        return $this -> fileUploadRepository -> saveFile($request);
    }

    function show($token) {
        return $this -> fileUploadRepository -> getFile($token);
    }
}
