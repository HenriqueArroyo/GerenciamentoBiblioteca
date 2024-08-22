<div class="header" >
@if (Auth::check())
<nav class="navbar navbar-light" style="background-color: #ff0000; " style="margin-bottom: 10%">
    <a class="navbar-brand" href="#">
      <img src="{{asset('assets/img/SENAI.png')}}" width="150" height="40" class="d-inline-block align-top" alt="">

    </a>
    <div>
        <h3>Olá, {{Auth::user()->nome}}</h3>
    </div>
    <div>
        <form action="/logout" method="post">
        @csrf
        <input type='submit' value='Sair'>
        </form>
    </div>
  </nav>
@else
<nav class="navbar navbar-light" style="background-color: #ff0000; " style="margin-bottom: 10%">
    <a class="navbar-brand" href="#">
        <img src="{{asset('assets/img/SENAI.png')}}" width="150" height="40" class="d-inline-block align-top" alt="">

    </a>
    <div class="nav-bar">
        <a href="/login">Login</a>
        <a href="/registro">Registre-se</a>
    </div>
  </nav>
@endif


