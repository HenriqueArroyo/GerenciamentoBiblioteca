<!-- resources/views/emprestimos/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Empréstimos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Livro</th>
                    <th>Usuário</th>
                    <th>Data do Empréstimo</th>
                    <th>Data de Devolução</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emprestimos as $emprestimo)
                    <tr>
                        <td>{{ $emprestimo->livro->titulo }}</td>
                        <td>{{ $emprestimo->usuario->nome }}</td>
                        <td>{{ $emprestimo->dataEmprestimo }}</td>
                        <td>{{ $emprestimo->dataDevolucao ?? 'Não devolvido' }}</td>
                        <td>{{ $emprestimo->devolvido ? 'Devolvido' : 'Em andamento' }}</td>
                        <td>
                            @if (!$emprestimo->devolvido)
                                <form action="{{ route('emprestimos.devolucao', $emprestimo->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Marcar como Devolvido</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
