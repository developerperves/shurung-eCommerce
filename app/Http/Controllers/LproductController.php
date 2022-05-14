<?php

namespace App\Http\Controllers;

use App\Http\Requests\LproductRequest;
use App\Lproduct;
use App\Repositories\LproductRepository;
use Illuminate\Http\Request;

class LproductController extends Controller
{
    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\LproductRepository $repository
     *
     */
    public function __construct(LproductRepository $repository)
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
        return view('admin.lproduct.index',[
            'datas' => Lproduct::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lproduct.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LproductRequest $request)
    {
        $this->repository->store($request);
        return redirect()->route('latest.index')->withSuccess(__('New Latest Product Added Successfully.'));
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
    public function edit(Lproduct $latest)
    {
        return view('admin.lproduct.edit', compact('latest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lproduct $latest)
    {
        $this->repository->update($latest, $request);
        return redirect()->route('latest.index')->withSuccess(__('Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lproduct $latest)
    {
        $this->repository->delete($latest);
        return redirect()->route('latest.index')->withSuccess(__('Deleted Successfully.'));
    }
}
