@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Livro</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('livros.update', $livro->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $livro->titulo) }}" required>
                @error('titulo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" name="autor" id="autor" class="form-control" value="{{ old('autor', $livro->autor) }}" required>
                @error('autor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="anoPublicacao">Ano de Publicação</label>
                <input type="number" name="anoPublicacao" id="anoPublicacao" class="form-control" value="{{ old('anoPublicacao', $livro->anoPublicacao) }}" required min="1800" max="{{ date('Y') }}">
                @error('anoPublicacao')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="disponivel">Disponível</label>
                <select name="disponivel" id="disponivel" class="form-control" required>
                    <option value="1" {{ old('disponivel', $livro->disponivel) == '1' ? 'selected' : '' }}>Sim</option>
                    <option value="0" {{ old('disponivel', $livro->disponivel) == '0' ? 'selected' : '' }}>Não</option>
                </select>
                @error('disponivel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="img">Imagem</label>
                @if($livro->img)
                    <img src="{{ Storage::url($livro->img) }}" alt="{{ $livro->titulo }}" style="width: 100px;">
                @endif
                <input type="file" name="img" id="img" class="form-control">
                @error('img')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Livro</button>
        </form>
    </div>
@endsection
