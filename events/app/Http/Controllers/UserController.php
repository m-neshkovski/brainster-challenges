<?php

namespace App\Http\Controllers;

use App\Mail\UserEmailVerification;
use App\Models\User;
use App\Models\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboard', ['users' => User::with('role')->get()]);
    }

    public function notice() {
        return view('user.verification.notice');
    }

    public function validateUserEmail($id, $validation_token_hash) {
        $user = User::with('emailTokens')->find($id);

        if($user->emailTokens->last()->email_verify_token == $validation_token_hash) {
            $user->email_verified_at = now();
            $user->is_active = true;
            $user->update();
        }

        return redirect()->route('user.home');
    }

    public function resend($id) {
        $user = User::with('emailTokens')->find($id);

        if(count($user->emailTokens) == 0) {

            $token = VerifyEmail::make();
            $token->user_id = $id;
            $token->email_verify_token = Str::random(80);
            $token->save();

            Mail::to($user->email)->send(new UserEmailVerification($user));
            return redirect()->route('verification.notice')->with('status', 'Verification email sent.');
        } else {
            dd($user);
        }




        Mail::to($user->email)->send(new UserEmailVerification($user));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // done in register controller
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
