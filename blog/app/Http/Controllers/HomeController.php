<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Theme;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['themes' => Theme::where('user_id', Auth::user()->id)->orderByDesc('created_at')->get()]);
    }

    public function approve() {
        return view('home', ['themes' => Theme::where('user_id', '!=', Auth::user()->id)->orderByDesc('created_at')->get()]);
    }
}
