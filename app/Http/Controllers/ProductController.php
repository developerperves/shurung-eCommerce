<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests\GalleryRequest;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Repositories\ProductRepository;
use App\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\Back\ProductRepository $repository
     *
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('checkrole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $is_type = $request->has('is_type') ? ($request->is_type ? $request->is_type : '') : '';
        $category_id = $request->has('category_id') ? ($request->category_id ? $request->category_id : '') : '';

        $datas = Product::
        when($is_type, function ($query, $is_type) {
            if($is_type != 'outofstock'){
                return $query->where('is_type', $is_type);
            }else{
                return $query->whereStock(0)->whereItemType('normal');
            }
        })
        ->when($category_id, function ($query, $category_id) {
            return $query->where('category_id', $category_id);
        })
        ->get();
        return view('admin.product.index',[
            'datas' => Product::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $item_id = $this->repository->store($request);

        if($request->is_button == 0){
            return redirect()->route('product.index')->withSuccess(__('Product Added Successfully.'));
        }else{
            return redirect(route('product.edit', $item_id))->withSuccess(__('Product Added Successfully.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'product' => $product,
            'specification_name' => json_decode($product->specification_name,true),
            'specification_description' => json_decode($product->specification_description,true),
        ]);
    }

    

    /**
     * Show the form for get subcategory a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getsubCategory(Request $request)
    {
        
        $stringToSend = $request->category_id;
       $subcategory = Subcategory::where('category_id',$request->category_id)->get();
         foreach($subcategory as $sub){
            $stringToSend .= "<option value='".$sub->id."'>".$sub->name."</option>";
        }
        return $stringToSend;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->repository->update($product, $request);
        return redirect()->route('product.index')->withSuccess(__('Product Updated Successfully.'));
        // if($request->is_button == 0){
        //     return redirect()->route('product.index')->withSuccess(__('Product Updated Successfully.'));
        // }else{
            //     return redirect()->route('product.index')->withSuccess(__('Product Updated Successfully.'));
            // }
    }

    /**
     * Change the status for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $status
     * @return \Illuminate\Http\Response
     */
    public function status(Product $product,$status)
    {
        $product->update(['status' => $status]);
        return redirect()->back()->withSuccess(__('Status Updated Successfully.'));
    }
    public function type(Product $product,$type)
    {
        $product->update(['is_type' => $type]);
        return redirect()->back()->withSuccess(__('Type Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->repository->delete($product);
        return redirect()->back()->withSuccess(__('Product Deleted Successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function galleries(Product $product)
    {
        return view('admin.product.galleries', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\GalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function galleriesUpdate(GalleryRequest $request)
    {
        $this->repository->galleriesUpdate($request);
        return redirect()->back()->withSuccess(__('Gallery Information Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galleryDelete(Gallery $gallery)
    {
        $this->repository->galleryDelete($gallery);
        return redirect()->back()->withSuccess(__('Successfully Deleted From Gallery.'));
    }
}
