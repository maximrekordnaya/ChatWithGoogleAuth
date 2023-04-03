@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Двухфакторная авторизация') }}</div>

                    <div class="card-body">
                        <p class="text-center">
                            {{ __('Введите код активации') }}
                        </p>

                        <form method="POST" action="{{ route('two-factor.login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Код:') }}</label>

                                <div class="col-md-6">
                                    <input id="code" type="code" class="form-control @error('code') is-invalid @enderror" name="code" required autocomplete="current-code">

                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-0 form-group row mt-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Проверить') }}
                                    </button>
                                    <a href="{{route('auth.recovery-code')}}" class="ms-3">У меня нет доступа к приложению</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
