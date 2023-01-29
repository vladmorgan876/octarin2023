
@extends('layouts.app')
@section('content')
    <div class="fo" style="position:absolute;width: 100%;padding: 50px;top:2em">
        <nav class="fixed-top" style="margin-left: 70em;margin-top: 6em"><a style="text-decoration: none" href="{{route('mainPageAdmin')}}"><h6>На главную администратора</h6></a></nav>
        <nav class="fixed-top" style="margin-left: 70em;margin-top: 8em"><a style="text-decoration: none" href="{{route('EditDataInDb')}}"><h6>Показать весь каталог</h6></a></nav>
        <nav class="fixed-top" style="margin-left: 70em;margin-top: 10em"><a style="text-decoration: none" href="{{route('main')}}"><h6>Вернуться на сайт</h6></a></nav>
        <div class="container" style="margin-left:150px;margin-top: 2em">
            @if(isset($products))
                @foreach($products as $product)
                    <div class="card mb-sm-3" style="max-width: 740px;">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <img src="{{asset('/storage/'.$product->image)}}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text">{{$product->id}}.</p>
                                    <h5 class="card-title">{{$product->category}}</h5>
                                    <h4 class="card-title">{{$product->name}}</h4>
                                    <p class="card-text">{{$product->price}}.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom: 20px">
                        <a href="{{route('DeleteData',$product->id)}}">
                            <button type="button" class="btn btn-danger">Удалить</button>
                        </a>
                        <a href="{{route('EditData',$product->id)}}">

                            <button type="button" class="btn badge-info">Редактировать</button>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        <div style="position: fixed ;top: 12em;left: 70em">
            <h5 style="color: red">Поиск продукта по условию</h5>
            <form class="row g-1" id="inputcategory" method="POST" action="{{route('FindByCategory')}}">
                @csrf
                <div class="col-auto">
                    <input type="text" class="form-control" id="selectcategory" name="selectcategory" value="{{  old('selectcategory') }}" placeholder="Введите категорию" required autocomplete="selectcategory" autofocus >
                </div>
                <div style="margin-top: .5rem" class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Найти</button>
                </div>
            </form>
            <form class="row g-1" id="inputprice" method="POST" action="{{route('FindByPrice')}}">
                @csrf
                <div class="col-auto">
                    <input type="text" class="form-control" id="selectprice" name="selectprice" value="{{  old('selectprice') }}" placeholder="Введите цену продукта" required autocomplete="selectprice" autofocus >
                </div>
                <div style="margin-top: .5rem" class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Найти</button>
                </div>
            </form>
            <form class="row g-1" id="inputname" method="POST" action="{{route('FindByName')}}">
                @csrf
                <div class="col-auto">
                    <input type="text" class="form-control" id="selectname" name="selectname" value="{{  old('selectname') }}" placeholder="Введите имя продукта" required autocomplete="selectname" autofocus >
                </div>
                <div style="margin-top: .5rem" class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Найти</button>
                </div>
            </form>
        </div>

    </div>
@endsection
