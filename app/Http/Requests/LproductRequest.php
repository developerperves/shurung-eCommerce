<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LproductRequest extends FormRequest
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
        $required = $this->thumbnail ? '' : 'required';

        return [
            'thumbnail'      => [$required,'mimes:jpeg,jpg,png,svg'],
            'year' => 'required',
            'heading' => 'required',
            'description' => 'required'
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
            'thumbnail.required'  => __('Photo field is required.'),
            'thumbnail.mimes'  => __('Photo file format not supported.'),
            'year.required'  => __('Year field is required.'),
            'heading.required'  => __('Year field is required.'),
            'description.required'  => __('Description field is required.'),
        ];
    }
}
