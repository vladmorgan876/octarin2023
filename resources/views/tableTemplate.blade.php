@section('content')
    <table class="table table-striped table-hover table-bordered table-success ">
        <caption>{{$title}}</caption>
        <div style="color: red;margin-left: 450px"> <h3>{{{$title}}}</h3></div>
        <thead>
        <tr>
            <th scope="col">Имя</th>
            <th scope="col">Сообщение</th>
            <th scope="col">E-mail</th>
            <th scope="col">Телефон</th>
            <th scope="col">Viber</th>
            <th scope="col">Telegram</th>
            <th scope="col">WhatsApp</th>
            <th scope="col">Название изделия</th>
            <th scope="col">Категория</th>
            <th scope="col">Цена изделия</th>
            <th scope="col">Количество</th>
            <th scope="col">Сумма</th>
            <th scope="col">Дата заказа</th>
            <th scope="col">Дата выполнения</th>
            <th scope="col">Статус</th>
            <th scope="col">изменить статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Orders as $product)
            <tr>
                <td>{{$product->username}}</td>
                <td>{{$product->textuser}}</td>
                <td>{{$product->email}}</td>
                <td>{{$product->phone}}</td>
                <td>{{$product->viber}}</td>
                <td>{{$product->telegram}}</td>
                <td>{{$product->whatsapp}}</td>
                <td>{{$product->productname}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->productprice}}</td>
                <td>{{$product->productquantity}}</td>
                <td>{{$product->totalsum}}</td>
                <td>{{$product->orderdate}}</td>
                <td>{{$product->ordercompleted}}</td>
                <td>{{$product->status}}</td>
                <td><a style="text-decoration: none" href="{{route('ordercompleted',$product->id)}}"><p>выполнен</p></a><a style="text-decoration: none" href="{{route('orderdelete',$product->id)}}"><p>удалить</p></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
