@extends('layouts.app')
@section('content')

    <div>
        <h5 style="position:relative;display: flex;justify-content: center">Для входа в кабинет нужно зарегистрироваться или авторизироваться</h5>
    </div>
    <div style="margin-left: 50px">
        @php
            if(isset(Auth::user()->name)==true){
             header('location:/home');
             exit();
          }
        @endphp
    </div>
    <div>
                <ul>
                    <li> <a style="text-decoration: none" href="{{route('register')}}"><h5>зарегистрироваться</h5></a></li>
                    <li> <a style="text-decoration: none" href="{{route('login')}}"><h5>авторизироваться</h5></a></li>
                    <li> <a style="text-decoration: none" href="{{route('main')}}"><h5>главная</h5></a></li>
                </ul>
    </div>
@endsection

