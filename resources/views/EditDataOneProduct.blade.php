@extends('layouts.app')
@section('content')
    <nav class="fixed-top" style="margin-left: 70em;margin-top: 4em"><a style="text-decoration: none" href="{{route('mainPageAdmin')}}"><h6>На главную администратора</h6></a></nav>
    <div class="col-md-2" style="margin-left: 100px">
        <img class="img-fluid" src="{{asset('/storage/'.$editProduct[0]->image)}}">
    </div>
    <div style="">
        <div class="container ">
            <h2 style="text-align: center ;color: green">Форма редактирования данных продукта</h2>
            <form class="container" action="{{route('NewEditionProduct',$editProduct[0]->id)}}" method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <label>Выберите новое изображение продукта</label><br>
                <input type="file" name="image"><br>
                <input type="text" class="form-control" name="name" id="name" value="{{$editProduct[0]->name}}"><br>
                <input type="text" class="form-control" name="price" id="price" value="{{$editProduct[0]->price}}"><br>
                <input type="text" class="form-control" name="category" id="category"
                       value="{{$editProduct[0]->category}}"><br>
                <button class="btn btn-success" name="do_signup" type="submit">Сохранить изменения</button>
            </form>
            @isset($newimage)
            @endisset
        </div>
    </div>
@endsection


