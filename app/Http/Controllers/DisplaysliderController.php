<?php

namespace App\Http\Controllers;

use App\DisplaySlider;
use App\Repositories\DisplaysliderRepository;
use Illuminate\Bus\Dispatcher;
use Illuminate\Http\Request;

class DisplaysliderController extends Controller
{
    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\DisplaysliderRepository $repository
     *
     */
    public function __construct(DisplaysliderRepository $repository)
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
        return view('admin.display_slider.index', [
            'sliders' => DisplaySlider::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'photo' => 'required|mimes:jpeg,jpg,png,svg'
        ]);
        $this->repository->store($request);
        return redirect()->route('slider.index')->withSuccess(__('New Slider Added Successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DisplaySlider $slider)
    {
        return view('admin.display_slider.show', compact('slider'));
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
    public function update(Request $request, DisplaySlider $slider)
    {
        $request->validate([
            'photo' => 'required|mimes:jpeg,jpg,png,svg'
        ]);
        $this->repository->update($slider, $request);
        return redirect()->route('slider.index')->withSuccess(__('Slider Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DisplaySlider $slider)
    {
        $this->repository->delete($slider);
        return redirect()->route('slider.index')->withSuccess(__('Slider Deleted Successfully!'));
    }
}
