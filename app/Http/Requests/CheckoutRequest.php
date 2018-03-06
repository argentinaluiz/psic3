<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
        return [
            'email' => 'required|email',
            'name' => 'required|min:5|max:35',
            'address' => 'required',
            'number' => 'required|numeric',
            'complement' => 'required',
            'neighborhood' => 'required',
            'city_id' => 'min:1|max:25',
            'cep' => 'required|max:25',
            'phone' => 'required',
        ];
    }
}
