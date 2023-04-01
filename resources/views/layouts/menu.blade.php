<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss', 'resources/css/app.css'])
</head>
<body>

<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"></ul>


{{--            <div class="text-end">--}}
{{--                <button type="button" class="btn btn-outline-light me-2">Login</button>--}}
{{--                <button type="button" class="btn btn-warning">Sign-up</button>--}}
{{--            </div>--}}
            <div class="text-end">
                <a href="{{route('user.show', auth()->user()->id)}}"><button class="btn btn-warning">Личный кабинет</button></a>
                <form class="d-inline-block" action="{{route('logout')}}" method="POST">
                    @csrf
                    <input type="submit" value="Вийти" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>



</header>

@yield('content')

</body>
</html>
