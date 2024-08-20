@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Livros</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('livros.add') }}" class="btn btn-primary mb-3">Adicionar Novo Livro</a>

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
                @forelse($livros as $livro)
                    <tr>
                        <td>{{ $livro->titulo }}</td>
                        <td>{{ $livro->autor }}</td>
                        <td>{{ $livro->anoPublicacao }}</td>
                        <td>{{ $livro->disponivel ? 'Sim' : 'Não' }}</td>
                        <td>
                            @if($livro->img)
                                <img src="{{ Storage::url($livro->img) }}" alt="{{ $livro->titulo }}" style="width: 100px;">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja remover este livro?')">Remover</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nenhum livro encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
