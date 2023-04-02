@extends('layouts.menu')
@section('content')
    <div class="container pt-3 w-50">
        <h2>Смена имени и email</h2>
        <form method="POST" action="{{route('user.update.name-pass', $user->id)}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Обновить</button>
        </form>
        @error('name')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
        @error('email')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="mt-3">Смена пароля</h2>
        <form method="POST" action="{{route('user.update.pass', $user->id)}}">
        @csrf
        @method('PATCH')
            <div class="form-group">
                <label for="password_old">Старый пароль:</label>
                <input type="password" name="password_old" id="password_old" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Новый пароль:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Повторите пароль:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Обновить</button>
        </form>
        @error('password')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
        @if (session('successPass'))
            <div class="alert alert-success mt-3">
                {{ session('successPass') }}
            </div>
        @endif
        @if (session('wrongPass'))
            <div class="alert alert-danger mt-3">
                {{ session('wrongPass') }}
            </div>
        @endif
        <form method="POST" action="/user/two-factor-authentication">
            @csrf


            <h3 class="mt-3">Двухфакторная аутентификация</h3>
            @if(auth()->user()->two_factor_secret)
                @method('DELETE')
                <span class="text-success">Двух факторная аутентификация включена</span>
                <button type="submit" class="btn btn-danger">Выключить</button>
            <p class="text-bg-danger mt-3 mb-3 text-center">ОТСКАНИРУЙТЕ QR-КОД В СВОЕМ ПРИЛОЖЕНИИ Google Authenticator</p>
                <div class="m-3">
                    {!! auth()->user()->twoFactorQrCodeSvg() !!}
                </div>
            @else
                <span class="text-danger">Двух факторная аутентификация не включена</span>
                <button type="submit" class="btn btn-success">Включить</button>
            @endif

        </form>




    </div>
@endsection
