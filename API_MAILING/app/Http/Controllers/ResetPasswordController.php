<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetForm($user_id)
    {
        return view('auth.passwords.reset', ['user_id' => $user_id]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:table_user,id',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Fetch the user by ID
        $user = table_user::find($request->user_id);

        if ($user) {
            // Update the user's password
            $user->password_user = Hash::make($request->password);
            $user->save();

            return redirect('/')->with('status', 'Réinitialisation de mot de passe avec succès!');
        } else {
            return back()->withErrors(['user_id' => 'Utilisateur non trouvé.']);
        }
    }
}
