<!-- dashboard.blade.php -->

@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>Comentários Enviados</h1>

    @if($feedbacks->isEmpty())
        <p>Não há comentários enviados ainda.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID da Geladeira</th>
                    <th>Comentário</th>
                    <th>Avaliação (Estrelas)</th>
                    <th>Data de Envio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->geladeira_id }}</td>
                        <td>{{ $feedback->comentario }}</td>
                        <td>{{ $feedback->estrela }}</td>
                        <td>{{ $feedback->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
