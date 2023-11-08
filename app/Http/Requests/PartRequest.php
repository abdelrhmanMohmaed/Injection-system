<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartRequest extends FormRequest
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
            'part_no' => 'required',
            'machine_id' => 'required|exists:machines,id',
            'customer' => 'required',
            'internal' => 'required',
            'cell' => 'required',
            'category' => 'required',
            'family' => 'required',
            'color' => 'required',
            'inj_type' => 'required',
            'tool_no' => 'required',
            'cav' => 'required',
            'consumption_rate' => 'required',
            'cycle_time' => 'required',
            'qty' => 'required',
            'sorting' => 'required',
            'reject_rate' => 'required',
            'rate' => 'required',
            'resin_pn1' => 'required',
            'shot_wight1' => 'required',
            'resin_pn2' => 'required',
            'shot_wight2' => 'required',
            'resin_pn3' => 'required',
            'shot_wight3' => 'required',
            'resin_pn4' => 'required',
            'shot_wight4' => 'required',
            'description' => 'required',
        ];
    }
}
