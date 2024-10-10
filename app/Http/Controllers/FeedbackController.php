<?php

namespace App\Http\Controllers;

use App\Models\Geladeira;
use App\Models\Feedback; 
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('geladeira')->get();
        return view('admin.feedback.index', compact('feedbacks'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'geladeira_id' => 'required|exists:geladeiras,id',
            'comentario' => 'required|string|max:255',
            'estrelas' => 'required|integer|between:1,5',
        ]);
    
        Feedback::create($request->all());
        return redirect()->back()->with('success', 'Feedback enviado com sucesso!');
    }
    
    public function respond(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $request->validate(['resposta' => 'required|string']);
    
        $feedback->resposta = $request->resposta;
        $feedback->save();
    
        return redirect()->back()->with('success', 'Resposta enviada com sucesso!');
    }
    
}
