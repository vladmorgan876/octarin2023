@extends('layouts.app')
@section('content')
    <div class="container" style="background-image: url('/storage/newimage/cosmos.jpg');width: 100%;height: 80vh">
        <div>
            <h3 style="color: red ;text-align: center">КАБИНЕТ ПОЛЬЗОВАТЕЛЯ </h3>
            <h4 style="color: red ;text-align: center">Пользователь зарегистрирован с именем  <span style="color: blueviolet">{{ Auth::user()->name }}</span></h4>
            <h4 style="color: red ;text-align: center">Пользователь зарегистрирован с E-MAIL адресом <span style="color: blueviolet">{{ Auth::user()->email}}</span></h4>
            <h4 style="color: red ;text-align: center">Вы не делали покупок и не можете посмотреть свою историю или оставить отзыв</h4>
            <div style="text-align: center">
                <ul>
                    <li><a style="text-decoration: none" href="{{route('main')}}"><h5>Вернуться на сайт</h5></a> </li>
                    <li>  <a style="text-decoration: none" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                            <h5>{{ __('Выйти из кабинета') }}</h5>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
