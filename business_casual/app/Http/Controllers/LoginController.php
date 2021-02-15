<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        if(session()->has('loggedinUser')) {
            return view('info');
        } else {
            return view('login');
        }
    }

    public function info() {
        return view('info');
    }

    public function validation(Request $req) {

        $req->validate([
            'firstname' => 'required|max:15|alpha',
            'lastname' => 'required|alpha|max:25',
            'email' => 'sometimes|nullable|email'
        ]);

        session([
            'loggedinUser' => [
                'firstname' => $req->get('firstname'),
                'lastname' => $req->get('lastname'),
                'email' => $req->get('email'),
            ]
        ]);

        // var_dump($validated);
        // validaiton success
        return view('info');
    }

    public function logout() {
        session()->flush();

        return view('home');
    }
}
