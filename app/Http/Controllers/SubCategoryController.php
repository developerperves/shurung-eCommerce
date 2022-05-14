<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryRequest;
use App\Repositories\SubcategoryRepository;
use App\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\Back\SubCategoryRepository $repository
     *
     */
    public function __construct(SubcategoryRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sub_category.index',[
            'datas' => Subcategory::with('category')->orderBy('id','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sub_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
        $this->repository->store($request);
        return redirect()->route('admin.subcategory.index')->withSuccess(__('New Subcategory Added Successfully.'));
    }


    /**
     * Change the status for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $status
     * @return \Illuminate\Http\Response
     */
    public function status($id,$status)
    {
        Subcategory::find($id)->update(['status' => $status]);
        return redirect()->route('admin.subcategory.index')->withSuccess(__('Status Updated Successfully.'));
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
    public function edit(Subcategory $subcategory)
    {
        return view('admin.sub_category.edit',compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $this->repository->update($subcategory, $request);
        return redirect()->route('admin.subcategory.index')->withSuccess(__('Subcategory Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $this->repository->delete($subcategory);
        return redirect()->route('admin.subcategory.index')->withSuccess(__('Subcategory Deleted Successfully.'));
    }
}
