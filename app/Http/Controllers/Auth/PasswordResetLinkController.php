<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\UserEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    public function aktivasi()
    {
        return view('auth.aktivasi-akun');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', new UserEmail],
        ]);

        $peserta = DB::table('peserta_event')->where('email', $request->email)->first();
        $user = User::where('email', $peserta->email)->count();

        if ($user < 1) {
            $new = User::create([
                "email" => $peserta->email,
                "password" => \bcrypt(""),
                "nama" => $peserta->nama,
                "telp" => $peserta->telp,
                "wa" => $peserta->telp,
            ]);
        }

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $email = $user < 1 ? ["email" => $new->email] : $request->only('email');
        // ddd($email);
        $status = Password::sendResetLink(
            $email
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
}
