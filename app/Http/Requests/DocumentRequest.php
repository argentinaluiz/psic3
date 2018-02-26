<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
        $file = $this->route('file');
        $fileId = $file instanceof File ? $file->id : null;

        $rules = [
            'description'   => 'min:3|max:1000'
        ];

        return $rules;
    }
}
