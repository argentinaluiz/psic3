<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
        $search = $this->route('search');
        $searchId = $search instanceof Search ? $search->id : null;

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'year' => 'required|numeric'
        ];

        return $rules;
    }
}
