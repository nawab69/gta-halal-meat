<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function privacy(){
        return view('privacy');
    }
    public function terms(){
        return view('terms');
    }
    public function faq(){
        $faqs = Faq::all();
        return view('faq',compact('faqs'));
    }
    public function halalcert(){
        return view('halalcert');
    }
    public function refund(){
        return view('refund');
    }

}
