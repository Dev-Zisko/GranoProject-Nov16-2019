@extends('layouts.home')

@section('content')
<section class="hero-wrap js-fullheight">
    <div class="container">
        <div class="row description js-fullheight align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <div class="text">
                    <h2 style="color: white; font-weight: bold;">{{ __('Resetear contraseña') }}</h2>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label style="color: white; font-weight: bold;" for="email" class="col-md-4 col-form-label text-md-right">{{ __('Dirección de correo electrónico registrado') }}</label>

                            <div class="col-md-6">
                                <input style="color: black;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar link de reseteo') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
