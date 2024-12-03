<!-- resources/views/pages/home.blade.php -->
@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <style>
        /* Estilos específicos para a home */
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1.5rem;
            color: #007bff;
        }

        .card-body {
            padding: 20px;
        }

        .row {
            margin-top: 20px;
        }

        .col-md-4 {
            margin-bottom: 20px;
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .col-md-4 {
                margin-bottom: 15px;
            }
        }
    </style>

    <h1>Ofertas para você</h1>
    <div class="row">
        @foreach($featuredPosts as $post)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title'] }}</h5>
                        <p class="card-text">{{ $post['content'] }}</p>
                        <a href="{{ route('geladeira.form', ['id' => $post['id']]) }}">
                            <img src="{{ asset('https://cdn.leroymerlin.com.br/categories/geladeira_1f60_300x300.jpg') }}" alt="Geladeira">
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
