<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'name_file', 'path', 'token'
    ];
    // Crea url para visualizar la imagen
    protected $appends = ['url'];
    function getUrlAttribute() {
        return asset($this->path);
    }

    function scopeSelectData($query) {
        return $query->select('name', 'token', 'path');
    }

    function scopeFilesData($query) {
        return $this->selectData($query)->orderBy('id', 'desc');
    }

    function scopefileData($query, $token) {
        return $this->selectData($query)->where('token', $token)
                    ->first();
    }

}
