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

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
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
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif



    </div>
@endsection
