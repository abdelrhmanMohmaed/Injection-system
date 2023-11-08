<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineRequest extends FormRequest
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
            'seel' => 'required|exists:seels,id',
            'type' => 'required',
            'tonnage' => 'required|numeric',
            'screw' => 'required',
            'robot' => 'required',
            'area' => 'required',
            'semi_auto' => 'required',
            'serial' => 'required',
        ];
    }
}
