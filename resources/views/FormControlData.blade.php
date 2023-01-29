@extends('layouts.app')
@section('content')
    <nav class="fixed-top" style="margin-left: 70em;margin-top: 4em"><a style="text-decoration: none" href="{{route('mainPageAdmin')}}"><h6>На главную администратора</h6></a></nav>
    <div style="">
        <div class="container ">
            <h2 style="text-align: center ;color: green">Форма загрузки новых данных</h2>
            {{------------------------------------ошибки валидации изображения-------------------------------------------}}
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- ----------------------------------------------------------------------------   --}}
            <form class="container" action="{{route('controldata')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <label>Выберите изображение изделия из файла на вашем компьютере</label><br>
                <input id="inputimage" type="file" name="image"><br>
                <input type="text" class="form-control" name="name" id="name" placeholder="Введите название изделия" required><br>
                <input type="text" class="form-control" name="category" id="author"
                       placeholder="Введите категорию изделия" required><br>
                <input type="text" class="form-control" name="price" id="category"
                       placeholder="Введите цену изделия" required><br>
                <button class="btn btn-success" name="do_signup" type="submit">сохранить данные</button>
            </form>
        </div>
    </div>
@endsection

