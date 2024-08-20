@extends('layouts.app') <!-- Ou o layout que você estiver usando -->

@section('content')
    <div class="container">
        <h1>Lista de Livros</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ano de Publicação</th>
                    <th>Disponível</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livros as $livro)
                    <tr>
                        <td>{{ $livro->titulo }}</td>
                        <td>{{ $livro->autor }}</td>
                        <td>{{ $livro->anoPublicacao }}</td>
                        <td>{{ $livro->disponivel ? 'Sim' : 'Não' }}</td>
                        <td>
                           <img src="{{asset("storage/{$livro->img}")}}" alt="img" width="100">
                        </td>
                        <td>
                            <form action="" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Emprestimo</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
