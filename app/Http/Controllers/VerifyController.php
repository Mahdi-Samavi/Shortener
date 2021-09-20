<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;

class VerifyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $token = sha1(time());

        $user = auth()->user();

        if ($user->verified) {
            return redirect()->home()->with(['status' => __('Your email has already been verified.')]);
        }

        $user->verify_token = $token;
        $user->save();

        Mail::send('emails.verify-email', compact('token'), function ($message) use ($user) {
            $message->from(env('EMAIL'), 'Shortener')
                ->to($user->email, $user->name)
                ->subject(__('Verify email'));
        });

        return view('verify-email-sent');
    }

    public function verifying(Request $request)
    {
        $user = User::where('verify_token', $request->token)->firstOrFail();
        $user->verify_token = null;
        $user->verified = true;
        $user->save();

        return redirect()->home()->with(['status' => __('Email verified successfully.')]);
    }
}
