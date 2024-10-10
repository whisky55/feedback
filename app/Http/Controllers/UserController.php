<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Exibe o formulário de edição
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    // Atualiza os dados do usuário
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Atualiza o nome e o e-mail
        $user->name = $request->name;
        $user->email = $request->email;

        // Atualiza a senha se fornecida
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Salva as alterações

        return redirect()->route('profile.edit')->with('success', 'Perfil atualizado com sucesso!');
    }
}
