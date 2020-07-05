@extends('layouts.app')

@section('content')

<style>



.fb {
  background-color: #3B5998;
  color: white;
}

.twitter {
  background-color: #55ACEE;
  color: white;
}

.google {
  background-color: #dd4b39;
  color: white;
}

</style>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="padding:0px;">
                <div class="card-header" style="background-color:#6cb2eb; margin:0px 0px 10px 0px;"><h3>{{ __('Login') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembrar login') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
                                    </a>
                                @endif
                                
                         
                        <p></p>
                        <div class="form-group row">
                            <div class="col-md-9">
                                <a href="{{ route('login.facebook') }}" class="fb btn btn-block">
                                    <i class="fa fa-facebook fa-fw"></i> Login com Facebook
                                </a>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-9">
                                <a href="#" class="twitter btn btn-block">
                                    <i class="fa fa-twitter fa-fw"></i> Login com Twitter
                                </a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9">
                                <a href="#" class="google btn btn-block"><i class="fa fa-google fa-fw">
                                    </i> Login com Google+
                                </a>
                            </div>
                        </div>
                      

      
                        </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
