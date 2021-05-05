<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this -> isMethod('post')) {
            return [
                'name' => 'required|min:4|max:30|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+$/u',
                'file' => 'required|mimes:jpg,jpeg,png|max:2048'
            ];
        }
    }
}
