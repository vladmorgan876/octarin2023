@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 style="color: red ;text-align: center">КАБИНЕТ ПОЛЬЗОВАТЕЛЯ </h3>
        <h4 style="color: red ;text-align: center">пользователь зарегистрирован с именем  <span style="color: blueviolet">{{ Auth::user()->name }}</span></h4>
        <h4 style="color: red ;text-align: center">пользователь зарегистрирован с E-MAIL адресом <span style="color: blueviolet">{{ Auth::user()->email}}</span></h4>
            <div style="position:relative;background-color:gainsboro">
                <ul style="align-content: center">
                    <li><a style="text-decoration: none;" href="{{route('MyOrders')}}"><h5>Мои заказы</h5></a></li>
                    <li><a style="text-decoration: none;" href="{{route('message')}}"><h5>Оставить отзыв</h5></a></li>
                    <li><a style="text-decoration: none" href="{{route('main')}}"><h5>Вернуться на сайт</h5></a> </li>
                    <li><a style="text-decoration: none" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                            <h5>{{ __('Выйти из кабинета') }}</h5>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                            @csrf
                        </form></li>
                </ul>
            </div>

            @if(isset($clientsOrders))
                <table class="table table-striped table-hover table-bordered table-success ">
                    <caption>Список всех заказов</caption>
                    <div style="color: red;text-align: center"> <h3>Список заказов клиента <span style="color: blueviolet">{{$clientsOrders[0]->username}}</span></h3></div>
                    <thead>
                    <tr>
                        <th scope="col">Название изделия</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Цена изделия</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Сумма</th>
                        <th scope="col">Дата заказа</th>
                        <th scope="col">Дата выполнения</th>
                        <th scope="col">Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientsOrders as $product)
                        <tr>
                            <td>{{$product->productname}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->productprice}}</td>
                            <td>{{$product->productquantity}}</td>
                            <td>{{$product->totalsum}}</td>
                            <td>{{$product->orderdate}}</td>
                            <td>{{$product->ordercompleted}}</td>
                            <td>{{$product->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        @isset($MessageFromUser)
        @if($MessageFromUser==true)
        <div class="container ">
            <h2 style="text-align: center ;color: red">Ваш отзыв</h2>
            <form class="container" action="{{route('SendMessage')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="text">Здесь Вы можете оставить отзыв</label>
                    <textarea name="message" class="form-control" rows="5" required></textarea>
                </div>
                <button class="btn btn-success" name="do_signup" type="submit">Отправить отзыв</button>
            </form>
        </div>
        @endif
        @endisset
    </div>
@endsection

