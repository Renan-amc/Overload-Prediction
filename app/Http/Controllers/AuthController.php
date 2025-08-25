<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function loginSubmit(LoginRequest $request): RedirectResponse
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)
            ->where('deleted_at', NULL)
            ->first();

        // Verifica se é um usuário válido
        if(!$user){
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Usuário ou senha incorretos!');
        }

        // Verifica se a senha está correta
        if(!password_verify($password, $user->password)){
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Usuário ou senha incorretos!');
        }

        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        // Inicia a sessão
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'image' => $user->image
            ]
        ]);

        return redirect()->to('/');
    }

    public function logout(): RedirectResponse
    {
        // Reseta a sessão
        session()->forget('user');
        return redirect()->to('login');
    }
}
