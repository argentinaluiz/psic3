<?php

namespace App\Http\Requests;

use App\Models\Painel\Permission;
use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        $permission = $this->route('permission');
        $permissionId = $permission instanceof Permission ? $permission->id : null;

        $rules = [
            'name' => 'required|min:3|max:50',
            'label' => 'max:150'
        ];

        return $rules;
    }
}
