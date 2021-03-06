<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GearRequest extends FormRequest
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
            'name' => 'required|string|max:30',
            'comment' => 'required|string|max:100',
            'gear_img' => 'required|image',
        ];
    }
}
