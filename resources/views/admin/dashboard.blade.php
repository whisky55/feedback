@extends('layouts.master')

@section('content')
    <h1>Painel de Administração</h1>
    <p>Bem-vindo ao painel de administração!</p>

    <!-- Botão de Logout -->
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

    <!-- Botão para Gerenciar o Perfil -->
    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Gerenciar Perfil</a>
@endsection
