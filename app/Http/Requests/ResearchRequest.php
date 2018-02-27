<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResearchRequest extends FormRequest
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
        $research = $this->route('research');
        $researchId = $research instanceof Research ? $research->id : null;

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'year' => 'required|numeric',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ];

        return $rules;
    }
}
