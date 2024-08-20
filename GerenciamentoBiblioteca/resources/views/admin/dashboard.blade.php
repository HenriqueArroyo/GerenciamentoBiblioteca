@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Dashboard - Administrador</h3>
        <form action="{{ route('usuarios.logout') }}" method="post">
            @csrf
            <a href="/livros">Gerenciar Livros</a>
            <input type="submit" value="sair">
        </form>

        @if (Auth::check())
            <span>voce esta logado</span>
        @endif
    </div>
@endsection
