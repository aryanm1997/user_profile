<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Assuming you're working with a users table in DB
use Illuminate\Support\Facades\Auth; // For authentication
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{
    public function confirmEmail($email)
    {
        $user = DB::table('users')->where('email', $email)->first();

        if ($user) {
            DB::table('users')->where('email', $email)->update(['email_verified_at' => now()]);
            Auth::loginUsingId($user->id);
            return redirect()->route('dashboard')->with('success', 'Email confirmed successfully. Welcome to your dashboard!');
        }

        return redirect()->route('dashboard')->with('error', 'Invalid email confirmation link.');
    }
}
