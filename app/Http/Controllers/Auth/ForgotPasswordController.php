<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    public function __construct()
    {
        $this->middleware('guest:admins');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        // Find the admin by email in the 'admins' table
        $admin = Admin::where('email', $request->email)->first();
        // dd($admin);
        // If the admin with the provided email exists
        if ($admin) {
            // Generate a password reset token and send the reset link email
            $token = Password::broker('admins')->createToken($admin);

            // Send the password reset link email
            $admin->sendPasswordResetNotification($token);

            // Redirect back with success message
            return back()->with('status', 'Password reset link sent successfully.');
        } else {
            // Admin with the provided email does not exist
            return back()->withErrors(['email' => 'We can\'t find an admin with that email address.']);
        }
    }

}
