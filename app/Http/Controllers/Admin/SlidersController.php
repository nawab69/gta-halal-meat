<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadAble;

class SlidersController extends BaseController
{
    use UploadAble;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.sliders.index',compact('sliders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'button' => 'required',
            'link' => '',
            'image' => 'required'
        ]);

        if ($request->has('image') && ($request['image'] instanceof  UploadedFile)) {
            $image = $this->uploadOne($request['image'], 'slider');
        }
        $create = Slider::create([
            'title' => $request['title'],
            'subtitle' => $request['subtitle'],
            'button' => $request['button'] ?? 'SHOP NOW',
            'link' => $request['link'] ?? '#',
            'image' => $image
        ]);

        return $this->responseRedirectBack('Slider Added successfully.', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Slider $slider,$id)
    {
        $slider = Slider::where('id',$id)->first();
        return view('admin.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'button' => 'required',
            'link' => '',
            'image' => 'required'
        ]);

        $slider = Slider::where('id',$request->id)->first();

        if ($request->has('image') && ($request['image'] instanceof  UploadedFile)) {
            $image = $this->uploadOne($request['image'], 'slider');
        }
        $update = $slider->update([
            'title' => $request['title'],
            'subtitle' => $request['subtitle'],
            'button' => $request['button'],
            'link' => $request['link'],
            'image' => $image
        ]);

        return $this->responseRedirectBack('Slider Updated successfully.', 'success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Slider $slider,$id)
    {
        $slider = Slider::where('id',$id)->first();
        $slider->delete();
        return $this->responseRedirectBack('Slider Deleted successfully.', 'success');//
    }
}
