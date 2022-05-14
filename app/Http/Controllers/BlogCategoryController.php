<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\Http\Requests\BlogCategoryRequest;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\Back\BcategoryRepository $repository
     *
     */
    public function __construct(BlogCategoryRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('checkrole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog_category.index',[
            'datas' => BlogCategory::orderBy('id','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryRequest $request)
    {
        $this->repository->store($request);
        return redirect()->route('bcategory.index')->withSuccess(__('New Category Added Successfully.'));
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
        $shipping = BlogCategory::find($id)->update(['status' => $status]);
        return redirect()->route('bcategory.index')->withSuccess(__('Status Updated Successfully.'));
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
    public function edit(BlogCategory $bcategory)
    {
        return view('admin.blog_category.edit',compact('bcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryRequest $request, BlogCategory $bcategory)
    {
        $this->repository->update($bcategory, $request);
        return redirect()->route('bcategory.index')->withSuccess(__('Category Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $bcategory)
    {
        $this->repository->delete($bcategory);
        return redirect()->route('bcategory.index')->withSuccess(__('Category Deleted Successfully.'));
    }
}
