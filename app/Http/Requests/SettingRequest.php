<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            // 'address' => 'required|max:255',
            // 'phone' => 'required|max:255',
            // 'email' => 'required|max:255',
            // 'about_story_heading' => 'required|max:255',
            // 'about_story_description' => 'required|max:255',
            // 'about_story_quote' => 'required|max:255',
            // 'about_shop_heading' => 'required|max:255',
            // 'about_shop_description' => 'required|max:255',
            // 'map' => 'required|max:255',
            // 'terms_conditions' => 'required|max:255',
            // 'privecy_policy' => 'required|max:255',
            // 'return_refund' => 'required|max:255',
            'nav_logo' => 'mimes:jpeg,jpg,png,svg',
            'footer_logo' => 'mimes:jpeg,jpg,png,svg',
            'favicon' => 'mimes:jpeg,jpg,png,svg',
            'new_collection_banner' => 'mimes:jpeg,jpg,png,svg',
            'about_story_top_photo' => 'mimes:jpeg,jpg,png,svg',
            'about_story_bottom_photo' => 'mimes:jpeg,jpg,png,svg',
            'about_shop_top_photo' => 'mimes:jpeg,jpg,png,svg',
            'about_shop_bottom_photo' => 'mimes:jpeg,jpg,png,svg',
            'payment_getway_image' => 'mimes:jpeg,jpg,png,svg',
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
            'nav_logo.mimes'    => __('Navigation Logo Image type must be jpg,jpeg,png,svg.'),
            'footer_logo.mimes'    => __('Footer Logo Image type must be jpg,jpeg,png,svg,gif.'),
            'favicon.mimes'    => __('Favicon type must be jpg,jpeg,png,svg,gif.'),
            'new_collection_banner.mimes'    => __('New Collection Banner Image type must be jpg,jpeg,png,svg,ico.'),
            'about_story_top_photo.mimes'    => __('About Story Top Image type must be jpg,jpeg,png,svg.'),
            'about_story_bottom_photo.mimes'    => __('About Story Bottom Image type must be jpg,jpeg,png,svg.'),
            'about_shop_top_photo.mimes'    => __('About Shop Top Image type must be jpg,jpeg,png,svg.'),
            'about_shop_bottom_photo.mimes'    => __('About Shop Bottom Image type must be jpg,jpeg,png,svg.'),
            'payment_getway_image.mimes'    => __('Payment Gateway Image must be jpg,jpeg,png,svg.'),
        ];
    }
}
