<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        
        $id = $this->blog ? ',' . $this->blog->id : '';
        $required = $this->blog ? '' : 'required';

        return [
            'title'            => 'required|max:255',
            'category_id'     => 'required',
            'details'         => 'required',
            'photo'           => $required, 'mimes:jpeg,jpg,png,svg',
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
            'title.required'            =>  __('Title field is required.'),
            'category_id.required'     =>  __('Category field is required.'),
            'details.required'         =>  __('Description field is required.'),
            'photo.required'           =>  __('Image field is required.'),
            'photo.mimes'              =>  __('Image type must be jpg,jpeg,png,svg.')
        ];
    }
}
