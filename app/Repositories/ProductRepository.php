<?php

namespace App\Repositories;

use App\Gallery;
use App\Helpers\ImageHelper;
use App\Product;

class ProductRepository
{
    public function __construct()
    {
        //
    }


    

    /**
     * Store item.
     *
     * @param  \App\Http\Requests\ItemRequest  $request
     * @return void
     */

    public function store($request)
    {
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $images_name = ImageHelper::ItemhandleUploadedImage($request->file('photo'),'assets/images');

            $input['photo'] = $images_name[0];
            // $input['thumbnail'] = $images_name[1];
        }
        $input['discount_price'] = $request->discount_price;
        $input['previous_price'] = $request->previous_price;

        if($request->has('meta_keywords')){
            $input['meta_keywords'] = str_replace(["value", "{", "}", "[","]",":","\""], '', $request->meta_keywords);
        }

        if($request->has('tags')){
            $input['tags'] = str_replace(["value", "{", "}", "[","]",":","\""], '', $request->tags);
        }

        if($request->has('is_specification')){
            $input['specification_name'] = json_encode($input['specification_name']);
            $input['specification_description'] = json_encode($input['specification_description']);
        }else{
            $input['is_specification']    = 0;
            $input['specification_name'] = null;
            $input['specification_description'] = null;
        }

        $input['is_type'] = 'new';

        $product_id = Product::create($input)->id;

        if(isset($input['galleries'])){
            $this->galleriesUpdate($request,$product_id);
        }

        return $product_id;

    }

    /**
     * Update item.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return void
     */

    public function update($product,$request)
    {
        $input = $request->all();

        if ( $request->file('photo')) {

            $images_name = ImageHelper::ItemhandleUpdatedUploadedImage($request->photo,'/assets/images',$product,'/assets/images/','photo');
            $input['photo'] = $images_name[0];
            // $input['thumbnail'] = $images_name[1];
        }


        if($request->has('meta_keywords')){
            $input['meta_keywords'] = str_replace(["value", "{", "}", "[","]",":","\""], '', $request->meta_keywords);
        }
        $input['discount_price'] = $request->discount_price;
        $input['previous_price'] = $request->previous_price;

        if($request->has('tags')){
            $input['tags'] = str_replace(["value", "{", "}", "[","]",":","\""], '', $request->tags);
        }

        if($request->has('is_specification')){
            $input['specification_name'] = json_encode($input['specification_name']);
            $input['specification_description'] = json_encode($input['specification_description']);
        }else{
            $input['is_specification']    = 0;
            $input['specification_name'] = null;
            $input['specification_description'] = null;
        }

        $product->update($input);
        if(isset($input['galleries'])){
            $this->galleriesUpdate($request,$product->id);
        }
    }

    /**
     * Delete item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($product)
    {
        if($product->galleries()->count() > 0){
            foreach($product->galleries as $gallery){
                $this->galleryDelete($gallery);
            }
        }
        // if($product->reviews->count() > 0){
        //     $product->reviews()->delete();
        // }

        ImageHelper::handleDeletedImage($product,'photo','assets/images/');
        $product->delete();
    }

    /**
     * Update gallery.
     *
     * @param  \App\Http\Requests\GalleryRequest  $request
     * @return void
     */

    public function galleriesUpdate($request,$item_id=null)
    {
        Gallery::insert($this->storeImageData($request,$item_id));
    }

    /**
     * Delete gallery.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function galleryDelete($gallery)
    {
        ImageHelper::handleDeletedImage($gallery,'photo','/assets/images/');
        $gallery->delete();
    }

    /**
     * Custom Function.
     * @return void
     */

    public function storeImageData($request,$product_id=null)
    {
        $storeData = [];
        if ($galleries = $request->file('galleries')) {
            foreach($galleries as $key => $gallery){
                $storeData[$key] = [
                    'photo'=>  ImageHelper::handleUploadedImage($gallery,'assets/images'),
                    'product_id' => $product_id ? $product_id : $request['product_id'],
                ];
            }
        }
        return $storeData;
    }
}
