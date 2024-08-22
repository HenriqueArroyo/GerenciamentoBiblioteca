<!-- resources/views/emprestimos/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Adicionar Empréstimo</h2>
        <form action="{{ route('emprestimos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="livro_id">Livro</label>
                <select name="livro_id" id="livro_id" class="form-control">
                    @foreach($livros as $livro)
                        <option value="{{ $livro->id }}">{{ $livro->titulo }} ({{ $livro->autor }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="usuario_id">Usuário</label>
                <select name="usuario_id" id="usuario_id" class="form-control">
                    @foreach($usuarios as $usuario)
                        <option value="{{Auth::user()->id}}">{{Auth::user()->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dataEmprestimo">Data do Empréstimo</label>
                <input type="date" name="dataEmprestimo" id="dataEmprestimo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dataDevolucao">Data de Devolução (opcional)</label>
                <input type="date" name="dataDevolucao" id="dataDevolucao" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Empréstimo</button>
        </form>

    </div>
@endsection
