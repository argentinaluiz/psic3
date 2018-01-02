<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $user = $this->route('user');
        $userId = $user instanceof User ? $user->id : null;

        $rules = [
            'name' => 'required|min:3|max:100|unique:users,name',
            'email' => 'required|email',
            'password'  => 'required|max:15'
        ];

        return $rules;
    }
}
