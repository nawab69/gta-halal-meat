<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends BaseController
{



    public function index(){
        $pages = Page::all();
        $privacy = $pages->where('name','privacy')->first()->text;
        $refund = $pages->where('name','refund')->first()->text;
        $terms = $pages->where('name','terms')->first()->text;
        $about = $pages->where('name','about')->first()->text;
        $halal = $pages->where('name','halalcert')->first()->text;
        $pageTitle = "Change Pages";
        return view('admin.pages.index',compact('privacy','refund','terms','about','halal','pageTitle'));
    }
    public function privacyUpdate(Request $request){
        $data = $request->privacy;
        $privacy = Page::where('name','privacy')->first();
        $privacy->text = $data;
        $privacy->update();
        return $this->responseRedirectBack('Page updated successfully.', 'success');
    }
    public function refundUpdate(Request $request){
        $data = $request->refund;
        $refund = Page::where('name','refund')->first();
        $refund->text = $data;
        $refund->update();
        return $this->responseRedirectBack('Page updated successfully.', 'success');
    }
    public function termsUpdate(Request $request){
        $data = $request->terms;
        $terms = Page::where('name','terms')->first();
        $terms->text = $data;
        $terms->update();
        return $this->responseRedirectBack('Page updated successfully.', 'success');
    }
    public function aboutUpdate(Request $request){
        $data = $request->about;
        $about = Page::where('name','about')->first();
        $about->text = $data;
        $about->update();
        return $this->responseRedirectBack('Page updated successfully.', 'success');
    }
    public function halalcertUpdate(Request $request){
        $data = $request->halal;
        $halalcert = Page::where('name','halalcert')->first();
        $halalcert->text = $data;
        $halalcert->update();
        return $this->responseRedirectBack('Page updated successfully.', 'success');
    }

}
