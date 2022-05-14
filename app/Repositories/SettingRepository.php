<?php

namespace App\Repositories;

use App\Helpers\ImageHelper;
use App\Setting;

class SettingRepository
{
    public function __construct()
    {
        //
    }
    public function update ($request) {
        
        
        $data = Setting::find(1);
        $input = $request->all();
   
        $image_files = ['nav_logo','footer_logo', 'favicon', 'new_collection_banner','about_story_top_photo','about_story_bottom_photo', 'about_shop_top_photo','about_shop_bottom_photo', 'payment_getway_image', 'blog_bg', 'arraivle_bg', 'wish_banner_bg', 'serch_banner_bg'];
        $input_field = ['address', 'phone', 'email', 'about_story_heading', 'about_story_description', 'about_story_quote', 'about_shop_heading', 'about_shop_description', 'map', 'terms_conditions', 'privecy_policy', 'return_refund'];
        foreach($image_files as $image_file){
            if ($file = $request->file($image_file)) {
                $input[$image_file] = ImageHelper::handleUpdatedUploadedImage($file,'/assets/images',$data,'/assets/images/',$image_file);
            }
        }
        
        if($request->social_icons && $request->social_links){
            $links = ['icons'=>$request->social_icons,'links'=>$request->social_links];
            $input['social_link'] = json_encode($links,true);
        }
        
        $data->update($input);
    }
}
