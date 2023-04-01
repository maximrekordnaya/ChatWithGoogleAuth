<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB SOCKET</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss', 'resources/css/app.css'])
</head>
<body>

<div class="container-fluid p-4">
    <div class="">
        <h4 class="name">{{auth()->user()->name}}</h4>
        <h3 class="email">{{auth()->user()->email}}</h3>
        <hr>
    </div>
    <div class="container-fluid">
        <div id="app">
            <div class="row">
                <div class="col-2">
                    <online-users></online-users>
                </div>
                <div class="col-10">
                    <chat-messages :user="{{auth()->user()}}"></chat-messages>

                    <chat-form></chat-form>
                </div>

            </div>
        </div>
    </div>
</div>


</body>
{{--попытка скролить сообщения в самый низ, перестало работать при использовании коспонентов--}}
{{--<script>--}}
{{--    var myDiv = document.getElementById("messages");--}}
{{--    myDiv.scrollTop = myDiv.scrollHeight;--}}
{{--</script>--}}
</html>
