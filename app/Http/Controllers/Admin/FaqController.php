<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faqs.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $faq = new Faq();
        return view('admin.faqs.create',compact('faq'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data =  request()->validate([
            'ques' => 'required',
            'ans' => 'required'
        ]);
        $faq = Faq::create($data);
        return $this->responseRedirectBack('Faq created successfully.', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Faq  $faq
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Faq $faq)
    {
            //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $faq = Faq::where('id',$id)->first();
        return view('admin.faqs.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Faq  $faq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $data =  request()->validate([
            'ques' => 'required',
            'ans' => 'required',
        ]);
         $faq = Faq::where('id',$request['id'])->first();
         $faq->update($data);
        return $this->responseRedirectBack('Faq updated successfully.', 'success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Faq  $faq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $faq = Faq::where('id',$id)->first();
        $faq->delete();
        return $this->responseRedirectBack('Faq Deleted successfully.', 'success');
    }
}
