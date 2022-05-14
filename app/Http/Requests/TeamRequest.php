<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
        $id = $this->team ? ',' . $this->team->id : '';
        $required = $this->team ? '' : 'required';

        return [
            'photo'      => [$required,'mimes:jpeg,jpg,png,svg'],
            'name'      => 'required|max:255',
            'designation'      => 'required|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'photo.required'  => __('Photo field is required.'),
            'name.required'  => __('Name field is required.'),
            'designation.required'  => __('Designation field is required.'),
            'photo.mimes'  => __('Photo file format not supported.'),
        ];
    }
}
