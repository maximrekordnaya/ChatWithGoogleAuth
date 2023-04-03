@extends('layouts.app')

@section('content')

{{--    здесь я хотел бы при отправке кода восстановления удалять двухфакторную авторизацию. Я сделал это путем изменения контроллера авторизации в vendor--}}
{{--    знаю что так делать не желательно, поэтому убрал. Ну и конечно вы бы не увидели моих изменений так как у вас была бы новая vendor. Убирать ее из gitIgnore--}}
{{--    я не рискнул так как делаю правки после того как отправил вам --}}


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center text-bg-warning">ЕСЛИ У ВАС НЕТ ДОСТУПА К ПРИЛОЖЕНИЮ ВВЕДИТЕ КОД ВОССТАНОВЛЕНИЯ КОТОРЫЙ ХРАНИТСЯ У ВАС</h3>

                <div class="card">
                    <div class="card-header">{{ __('Код восстановления') }}</div>

                    <div class="card-body">
                        <p class="text-center">
                            {{ __('Введите код восстановления') }}
                        </p>

                        <form method="POST" action="{{ route('two-factor.login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="recovery_code" class="col-md-4 col-form-label text-md-right">{{ __('Код восстановления:') }}</label>

                                <div class="col-md-6">
                                    <input id="recovery_code" type="recovery_code" class="form-control @error('recovery_code') is-invalid @enderror" name="recovery_code" required autocomplete="current-recovery_code">

                                    @error('recovery_code')
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
