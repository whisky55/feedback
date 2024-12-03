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
            <label for="comment">Nos envie seu feedback</label>
            <textarea id="comment" name="comentario" class="form-control" required></textarea>
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

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Voltar para a tela inicial</a>

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
        $(document).ready(function() {
            var stars = $(".star-icon");

            stars.on("click", function() {
                // Remover a classe 'ativo' de todas as estrelas
                stars.removeClass("ativo");
                
                // Adicionar a classe 'ativo' à estrela clicada
                $(this).addClass("ativo");

                // Definir o valor de 'estrela' baseado na estrela clicada
                var rating = $(this).data("avaliacao");
                $("#estrela").val(rating);
            });

            // Para manter as estrelas ativadas após o envio do formulário (se já foi avaliado)
            var estrelaSelecionada = $("#estrela").val();
            if (estrelaSelecionada) {
                stars.each(function() {
                    var estrelaValor = $(this).data("avaliacao");
                    if (estrelaValor <= estrelaSelecionada) {
                        $(this).addClass("ativo");
                    }
                });
            }
        });
    </script>

@endsection
