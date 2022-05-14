<?php

namespace App\Http\Controllers;

use App\Instagram;
use App\Repositories\InstagramRepository;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\InstagramRepository $repository
     *
     */
    public function __construct(InstagramRepository $repository)
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
        return view('admin.instagram.index', [
            'instagrams' => Instagram::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instagram.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpeg,jpg,png,svg',
            'link' => 'required'
        ]);
        $this->repository->store($request);
        return redirect()->route('instagram.index')->withSuccess(__('New Instagram Added Successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Instagram $instagram)
    {
        return view('admin.instagram.show', compact('instagram'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instagram $instagram)
    {
        $request->validate([
            'photo' => 'mimes:jpeg,jpg,png,svg',
            'link' => 'required'
        ]);
        $this->repository->update($instagram, $request);
        return redirect()->route('instagram.index')->withSuccess(__('Instagram Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instagram $instagram)
    {
        $this->repository->delete($instagram);
        return redirect()->route('instagram.index')->withSuccess(__('Instagram Deleted Successfully!'));
    }
}
