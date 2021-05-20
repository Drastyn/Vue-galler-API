<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'name_file', 'path', 'token', 'users_id'
    ];
    // Crea url para visualizar la imagen
    protected $appends = ['url'];
    function getUrlAttribute() {
        return asset($this->path);
    }

    function scopeSelectData($query) {
        return $query->select('file_uploads.name', 'file_uploads.token', 'file_uploads.path');
    }

    function scopeFilesData($query) {
        return $this->selectData($query)->orderBy('id', 'desc');
    }

    function scopefileData($query, $token) {
        return $this->selectData($query)
                    ->addSelect('file_uploads.users_id', 'users.name as user_name')
                    ->join('users', 'users.id', '=', 'file_uploads.users_id')
                    ->where('token', $token)->first();
    }

}
