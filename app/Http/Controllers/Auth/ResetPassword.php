<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPassword extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $token)
    {
        $request->merge(['token' => $token]);
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
 
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
 
        return $status === Password::PasswordReset
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => __($status), 'token' => __($status), 'password' => __($status), 'password_confirmation' => __($status)]);
    }
}
