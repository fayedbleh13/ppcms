{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">

            <x-jet-validation-errors class="mb-3 rounded-0" />

            @if (session('status'))
                <div class="alert alert-success mb-3 rounded-0" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                 name="email" :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Password') }}" />

                    <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="current-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <label class="custom-control-label" for="remember_me">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        @if (Route::has('password.request'))
                            <a class="text-muted mr-3" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-jet-button>
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <!-- ============================ COMPONENT LOGIN 1  ================================= -->
    <div class="container custom-login">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class="card login-form form-item form-stl border shadow">
                    <div class="card-body ">
                        <x-jet-validation-errors class="mb-3 rounded-0" />
                        <h4 class="card-title mb-4 font-weight-bold">Sign in</h4>
                        <form name="frm-login" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" id="frm-login-email" class="form-control" placeholder="ex. name@gmail.com" type="email" :value="old('email')" required autofocus>
                            </div> <!-- form-group// -->
                            <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" id="frm-login-pass" name="password" placeholder="********" type="password" required autocomplete="current-password">
                            </div> <!-- form-group// --> 
                            <div class="form-group"> 
                            <label class="custom-control custom-checkbox"> <input type="checkbox" name="remember" id="rememberme" class="custom-control-input" checked=""> <div class="custom-control-label"> Remember me</div> </label>
                            </div> <!-- form-group form-check .// -->
                            <div class="form-group">
                                <input type="submit"  name="submit" class="btn btn-primary btn-block" value="login">
                            </div> <!-- form-group// -->
                            <a class="float-right" href="{{ route('password.request') }}">Forgot Password?</a>    
                        </form>
                        
                    </div> <!-- card-body.// -->
                    <hr class="border login-border">
                    <div class="card-footer custom-card-footer text-center">Don't have an account? <a href="{{ route('register') }}">Sign up</a></div>
                </div> <!-- card .// -->
            </div>
        </div>
    </div>
    <!-- ============================ COMPONENT LOGIN 1  END.// ================================= -->
</x-guest-layout>