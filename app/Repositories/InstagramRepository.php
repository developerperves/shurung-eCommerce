<?php

namespace App\Repositories;

use App\Helpers\ImageHelper;
use App\Instagram;

class InstagramRepository
{
    public function __construct()
    {
        //
    }
    
    /**
     * Store meal.
     *
     * @param  \App\Http\Requests\ImageStoreRequest  $request
     * @return void
     */

    public function store($request)
    {
        $input = $request->all();
        $input['photo'] = ImageHelper::handleUploadedImage($request->file('photo'),'assets/images');
        Instagram::create($input);
    }

    /**
     * Update Brand.
     *
     * @param  \App\Http\Requests\ImageUpdateRequest  $request
     * @return void
     */

    public function update($instagram, $request)
    {
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $input['photo'] = ImageHelper::handleUpdatedUploadedImage($file,'/assets/images',$instagram,'/assets/images/','photo');
        }
        $instagram->update($input);
    }

    /**
     * Delete brand.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($instagram)
    {
        ImageHelper::handleDeletedImage($instagram,'photo','assets/images/');
        $instagram->delete();
    }
}
