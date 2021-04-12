<?php

namespace App\Http\Controllers;

use App\Events\SendVerificationEmail;
use App\Events\SetUserAsActive;
use App\Mail\UserEmailVerification;
use App\Models\User;
use App\Models\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmailVerificationController extends Controller
{
    public function notice() {
        return view('user.verification.notice');
    }

    public function validateUserEmail($id, $validation_token) {
        $user = User::with('emailTokens')->find($id);

        $token = $user->emailTokens->last();

        if($token->email_verify_token == $validation_token) {
            if(date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s', strtotime($token->created_at))."+48 hour")) > date('Y-m-d H:i:s', strtotime(now()))) {
                $user->email_verified_at = now();
                // $user->is_active = true;
                
                SetUserAsActive::dispatch($user);
                $user->update();
                
                $token->delete();
            } else {

                $token->delete();

                $newToken = VerifyEmail::make();
                $newToken->user_id = $id;
                $newToken->email_verify_token = Str::random(80);
                $newToken->save();

                $user = User::with('emailTokens')->find($id);

                SendVerificationEmail::dispatch($user);
                return redirect()->route('verification.notice')->with('status', 'Email verification token expierd. New verification email was sent, please try again.');
            }
        } else {
            abort(401);
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

            SendVerificationEmail::dispatch($user);

            return redirect()->route('verification.notice')->with('status', 'Verification email sent.');
        } else {
            $token = $user->emailTokens->last();
            if(date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s', strtotime($token->created_at))."+48 hour")) > date('Y-m-d H:i:s', strtotime(now()))) {

                // tokenot ne e istecen da se prati istiont mejl povtorno
                SendVerificationEmail::dispatch($user);
                return redirect()->route('verification.notice')->with('status', 'Email verification token still active. New verification email was sent.');
                
            } else {
                // tokenot e istecen da se prati nov
                $token->delete();

                $newToken = VerifyEmail::make();
                $newToken->user_id = $id;
                $newToken->email_verify_token = Str::random(80);
                $newToken->save();

                $user = User::with('emailTokens')->find($id);

                SendVerificationEmail::dispatch($user);
                return redirect()->route('verification.notice')->with('status', 'Email verification token expierd. New verification email was sent, please try again.');
            }
        }

    }
}
