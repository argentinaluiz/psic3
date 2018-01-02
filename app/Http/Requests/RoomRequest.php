<?php

namespace App\Http\Requests;

use App\Models\Painel\Room;
use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        $room = $this->route('room');
        $roomId = $room instanceof Room ? $room->id : null;
        $class_room = implode(',', array_keys(Room::CLASS_ROOM));
        $rules = [
            'client_id'     => 'required|exists:client,id',
            'class_room'    => "required|in:$class_room",
            'qty_pacients'  => 'required|integer'
        ];

        return $rules;
    }
}
