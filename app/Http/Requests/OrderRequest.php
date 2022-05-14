<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'cus_name' => 'required|max:255',
            'cus_email' => 'required|max:255',
            'cus_address' => 'required|max:1024',
            'cus_city' => 'required|max:255',
            'cus_postcode' => 'required|max:255',
            'cus_country' => 'required|max:255',
            'cus_phone' => 'required|max:255',
            'note' => 'required|max:1024',
        ];
    }
}
