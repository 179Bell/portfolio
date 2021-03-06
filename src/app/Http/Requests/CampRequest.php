<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampRequest extends FormRequest
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
            'title' => 'required|string|max:30',
            'date' => 'required|date',
            'discription' => 'required|string|max:300',
            'location' => 'required|string|max:30',
            'camp_img' => 'image',
        ];
    }
}
