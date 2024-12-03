<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Feedback;  // Certifique-se de importar o modelo Feedback

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
        // Buscando todos os feedbacks com a geladeira associada
        $feedbacks = Feedback::with('geladeira')->get();
    
        // Retornando a view com os feedbacks
        return view('admin.dashboard', compact('feedbacks'));
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
            'estrela' => 'required|integer|between:1,5',
        ]);

        // Salvar o feedback no banco de dados
        Feedback::create([
            'geladeira_id' => $id,
            'comentario' => $request->comentario,
            'estrela' => $request->estrela,  // Adicionando a estrela
        ]);

        // Redirecionar após o sucesso
        return redirect()->route('geladeira.form', ['id' => $id])
                         ->with('success', 'Feedback enviado com sucesso!');
    }
}
