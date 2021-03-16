<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThemeRequest;
use App\Http\Requests\UpdateThemeRequest;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function show() {
        return view('show');
    }

    public function create(ThemeRequest $request) {
        $theme = Theme::make();
        $theme->user_id = Auth::user()->id;
        $theme->category_id = $request->category;
        $theme->title = $request->title;
        $theme->description = $request->description;
        $theme->is_approved = Auth::user()->type->type == 'admin' ? true : false;
        
        $path = $request->file('image')->store('public/img');
        
        $theme->image = $path;
        $theme->save();

        return redirect()->route('theme.show')->with('status', Auth::user()->type->type == 'admin' ? 'Theme created and approved.' : 'Theme created, waithing on approval from admin.');
    }

    public function present($id) {
        return view('present', ['theme' => Theme::find($id)]);
    }

    public function edit($id) {
        return view('edit', ['theme' => Theme::find($id)]);
    }

    public function update(UpdateThemeRequest $request, $id) {
        $theme = Theme::find($id);
        $theme->category_id = $request->category;
        $theme->title = $request->title;
        $theme->description = $request->description;
        $theme->is_approved = Auth::user()->type->type == 'admin' ? true : false;

        if($request->has('image')) {
            $path = $request->file('image')->store('public/img');
            $theme->image = $path;
        }
        
        $theme->save();

        return redirect()->route('theme.show')->with('status', Auth::user()->type->type == 'admin' ? 'Theme created and approved.' : 'Theme created, waithing on approval from admin.');
    }

    public function delete($id) {
        Theme::find($id)->delete();
        return redirect('home')->with('status', 'Theme was deleted successfully!!!');
    }

    public function status($id) {
        $theme = Theme::find($id);

        if($theme->is_approved) {
            $theme->is_approved = false;
            $theme->save();
            return redirect()->back()->with('status', 'Theme was banned.');
        } else {
            $theme->is_approved = true;
            $theme->save();
            return redirect()->back()->with('status', 'Theme was approved.');
        }

    }

}
