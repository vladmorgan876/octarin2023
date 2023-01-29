@extends('layouts.app')
@section('content')
    @isset($AllMessagesFromUsers)
        <div class="container">
            <nav class="fixed-top" style="margin-left: 70em;margin-top: 4em"><a style="text-decoration: none" href="{{route('mainPageAdmin')}}"><h6>На главную администратора</h6></a></nav>
           @foreach($AllMessagesFromUsers as $message)
                <h5>{{$message->username}}</h5>
                <h5>{{$message->email}}</h5>
                <div style="background-color: gainsboro"><h5>{{$message->message}}</h5></div>
                <h5>{{$message->created_at}}</h5>
                <a style="text-decoration: none" href="{{route('messagedelete',$message->id)}}"><p>Удалить сообщение</p></a>
               <hr>
            @endforeach
        </div>
    @endisset;
    @isset($allMessegesFromVizitors)
        <div class="container">
            <nav class="fixed-top" style="margin-left: 70em;margin-top: 4em"><a style="text-decoration: none" href="{{route('mainPageAdmin')}}"><h6>На главную администратора</h6></a></nav>
            @foreach($allMessegesFromVizitors as $message)
                <h5>{{$message->letterFromUser}}</h5>
                <div style="background-color: gainsboro"><h5>{{$message->letterText}}</h5></div>
                <h5>{{$message->created_at}}</h5>
                <a style="text-decoration: none" href="{{route('LetterFromVizitorDelete',$message->id)}}"><p>Удалить сообщение</p></a>
                <hr>
            @endforeach
        </div>
    @endisset;
@endsection
