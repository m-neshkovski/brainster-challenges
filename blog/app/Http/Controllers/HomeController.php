<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Theme;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function front_page() {

        $themes = [
            // 'all' => Theme::where('is_approved', true)->orderByDesc('created_at')->get(),
            'all' => Theme::where('is_approved', true)->orderByDesc('created_at')->paginate(5),
        ];

        foreach(Category::all() as $category) {

            // $themes[$category->name] = Theme::where('is_approved', true)->where('category_id', $category->id)->orderByDesc('created_at')->get();
            $themes[$category->name] = Theme::where('is_approved', true)->where('category_id', $category->id)->orderByDesc('created_at')->paginate(5);

        }

        return view('welcome', ['themes' => $themes]);
    }

    public function index()
    {
        return view('home', ['themes' => Theme::where('user_id', Auth::user()->id)->orderByDesc('created_at')->get()]);
    }

    public function approve() {
        return view('home', ['themes' => Theme::where('user_id', '!=', Auth::user()->id)->where('is_approved', 0)->orderByDesc('created_at')->get()]);
    }
}
