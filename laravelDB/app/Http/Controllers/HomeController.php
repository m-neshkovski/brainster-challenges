<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home() {
        $cards = Project::orderByDesc('created_at')->get();
        return view('welcome', ['cards' => $cards]);
    }

    public function login() {
        return view('login');
    }

    public function authentication(LoginRequest $request) {

        
        $user = User::where('name', $request->name)->first();
        // dd(Hash::check($request->password, $user->password));
        
        if(Hash::check($request->password, $user->password)) {
            session()->put('loggedin', true);
            session()->put('id', $user->id);
            session()->put('name', $user->name);

            // return view('welcome', ['cards' => Project::all()]);
            return redirect()->route('home');
        } else {
            return redirect()->route('home.login');
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();

        return redirect()->route('home');
    }
}
