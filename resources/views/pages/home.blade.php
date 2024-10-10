@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <h1>Ofertas para você</h1>
    <div class="row">
        @foreach($featuredPosts as $post)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title'] }}</h5>
                        <p class="card-text">{{ $post['content'] }}</p>
                        <a href="{{ route('geladeira.form', ['id' => $post['id']]) }}">
                            <img src="{{ asset('https://cdn.leroymerlin.com.br/categories/geladeira_1f60_300x300.jpg') }}" alt="Geladeira" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
