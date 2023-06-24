@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 ">
                <div class="card">
                   
                    <!-- <div class="card-header">{{ __('Register') }}</div> -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label " style="padding-left:  89px">{{ __('Nom') }}</label>
                                 
                                <div class="col-md-6">
                                    <input id="name" type="text" placeholder="Votre nom"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" style="padding-left:  89px"
                                    class="col-md-4 col-form-label  ">{{ __('E-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" placeholder="nom@domaine.com" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="password" style="padding-left:  89px" 
                                    class="col-md-4 col-form-label ">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password" placeholder="Choisissez un mot de passe" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" style="padding-left: 89px"
                                    class="col-md-4 col-form-label">{{ __('Confirmer le mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" placeholder="Confirmer le mot de passe" type="password"
                                        class="form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class=" w-100 btn form-control"
                                        style="background-color:#00008B; color:white">
                                        {{ __('CRÉER UN COMPTE') }}
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
