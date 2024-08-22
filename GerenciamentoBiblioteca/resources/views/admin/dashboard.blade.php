@extends('layouts.app')

@section('content')
    <div class="container">
        <hr>
        <h3>Dashboard - Administrador</h3>
        <hr>
        <form action="{{ route('usuarios.logout') }}" method="post">
            @csrf
         <button type="submit"> <a href="/livros" style="text-decoration: none;" style="color: black">Gerenciar Livros</a></button><br><br><br><br>
          <button type="submit">  <a href="/emprestimos" style="text-decoration: none;" style="color: black">Emprestimos</a></button>

       </form>


    </div>
@endsection
