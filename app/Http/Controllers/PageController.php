<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $featuredPosts = [
            ['id' => 1, 'title' => 'Geladeira foda', 'content' => 'Geladeira muito foda com duas portas que sai agua na frente!']
        ];
        return view('pages.home', compact('featuredPosts'));

    }
    
    public function dashboard()
{
    return view('admin.dashboard');
}



    public function showGeladeiraForm($id)
{
    // Aqui você pode buscar os dados da geladeira pelo ID, se necessário
    return view('geladeira.form', compact('id')); // Retorne a view do formulário
}

public function storeFeedback(Request $request, $id)
{
    // Validação dos dados
    $request->validate([
        'comentario' => 'required|string|max:255',
    ]);

    // Salvar o feedback no banco de dados
    \App\Models\Feedback::create([
        'geladeira_id' => $id,
        'comentario' => $request->storeFeedback,
    ]);

    // Redirecionar após o sucesso
    return redirect()->route('geladeira.form', ['id' => $id])
                     ->with('success', 'Feedback enviado com sucesso!');
}



}



