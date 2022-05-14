<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Requests\BannerRequest;
use App\Repositories\BannerRepository;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\BannerRepository $repository
     *
     */
    public function __construct(BannerRepository $repository)
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
        return view('admin.banner.index',[
            'datas' => Banner::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $this->repository->store($request);
        return redirect()->route('banner.index')->withSuccess(__('New Banner Added Successfully.'));
    }
    /**
     * Change the status for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $status
     * @return \Illuminate\Http\Response
     */
    public function status($id,$status,$type)
    {
        Banner::find($id)->update([$type => $status]);
        return redirect()->route('banner.index')->withSuccess(__('Status Updated Successfully.'));
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
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $this->repository->update($banner, $request);
        return redirect()->route('banner.index')->withSuccess(__('Banner Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $this->repository->delete($banner);
        return redirect()->route('banner.index')->withSuccess(__('Banner Deleted Successfully.'));
    }
}
