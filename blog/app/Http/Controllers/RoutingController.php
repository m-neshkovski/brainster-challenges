<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutingController extends Controller
{
    public function home() {
        return view('home');
    }

    public function about() {
        return view('about');
    }
    
    public function post() {
        return view('post');
    }

    public function contact() {
        return view('contact');
    }
}
