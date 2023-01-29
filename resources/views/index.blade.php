<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>octarin</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script src="{{ asset('js/three.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

</body>
</html>
<div id="app">
    <navcomponent></navcomponent>
    <main>
        <div class="container">
            <router-view></router-view>
        </div>
    </main>
    <footer>
        <footercomponent></footercomponent>
    </footer>
</div>
<script>
</script>
