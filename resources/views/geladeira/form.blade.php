@extends('layouts.master')

@section('title', 'Formulário de Comentário')

@section('content')
    <h1>Comentário sobre a Geladeira</h1>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



    <form action="{{ route('geladeira.store', ['id' => $id]) }}" method="POST">
        @csrf
        <input type="hidden" name="geladeira_id" value="{{ $id }}">

    
        <div class="form-group">
            <label for="comment">Nos envie seu feedbeack</label>
            <textarea id="comment" name="comment" class="form-control" required></textarea>
        </div>
        
        <!-- Avaliação por estrelas -->
        <div class="form-group">
            <label for="rating">Sua Avaliação</label>

            <ul class="avaliacao">
                <li class="star-icon" data-avaliacao="1"></li>
                <li class="star-icon" data-avaliacao="2"></li>
                <li class="star-icon" data-avaliacao="3"></li>
                <li class="star-icon" data-avaliacao="4"></li>
                <li class="star-icon" data-avaliacao="5"></li>
            </ul>
            <input type="hidden" name="estrela" id="estrela" value="">
        </div>
        <style>
        .avaliacao {
            display: flex;
            cursor: pointer;
        }

        .star-icon {
            list-style-type: none;
            font-size: 40px;
            color: #ffe500;
            cursor: pointer;
        }

        .star-icon::before {
            content: "\2605"; /* Estrela cheia */
        }

        .star-icon:hover ~ .star-icon::before, 
        .star-icon.ativo ~ .star-icon::before {
            content: "\2606"; /* Estrela vazia */
        }

        .star-icon:hover::before {
            content: "\2605"; /* Estrela cheia no hover */
        }
        </style>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        var stars = document.querySelectorAll(".star-icon");

        document.addEventListener("click", function (e) {
            var classStar = e.target.classList;
            if (!classStar.contains("ativo")) {
                stars.forEach(function (star) {
                    star.classList.remove("ativo");
                });
                classStar.add("ativo");

                var rating = e.target.getAttribute("data-avaliacao");
                document.getElementById('estrela').value = rating;
            }
        });
        </script>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Voltar para a tela inicial</a>
@endsection




        