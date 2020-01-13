@extends('layout')

@section('content')
<div class="background"></div>

        <section id="conteudo-view" class="login">
        <h1>Estoque</h1>
        <h3>Mercearia do João</h3>
                

                    <form method="POST" action="{{ route('password.email') }}">
                         <p>Esqueceu sua senha?</p>
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Redefinir senha') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </section>
@endsection
