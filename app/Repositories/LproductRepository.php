<?php

namespace App\Repositories;

use App\Helpers\ImageHelper;
use App\Lproduct;

class LproductRepository
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
        $input['thumbnail'] = ImageHelper::handleUploadedImage($request->file('thumbnail'),'assets/images');
        Lproduct::create($input);
    }

    /**
     * Update Brand.
     *
     * @param  \App\Http\Requests\ImageUpdateRequest  $request
     * @return void
     */

    public function update($latest, $request)
    {
        $input = $request->all();
        if ($file = $request->file('thumbnail')) {
            $input['thumbnail'] = ImageHelper::handleUpdatedUploadedImage($file,'/assets/images',$latest,'/assets/images/','thumbnail');
        }
        $latest->update($input);
    }

    /**
     * Delete brand.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($latest)
    {
        ImageHelper::handleDeletedImage($latest,'thumbnail','assets/images/');
        $latest->delete();
    }
}
