{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-3" />

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <x-jet-label value="{{ __('Name') }}" />

                    <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                 :value="old('name')" required autofocus autocomplete="name" />
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                                 :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Password') }}" />

                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="new-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Confirm Password') }}" />

                    <x-jet-input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <x-jet-checkbox id="terms" name="terms" />
                            <label class="custom-control-label" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                            </label>
                        </div>
                    </div>
                @endif

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted mr-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button>
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> --}}
<x-guest-layout>
    <section class="section-content padding-y register-space">

        <!-- ============================ COMPONENT REGISTER   ================================= -->
            <div class="card mx-auto card form-item form-stl border shadow" style="max-width:520px; margin-top:40px;">
              <article class="card-body">
                <x-jet-validation-errors class="mb-3" />
                <header class="mb-4"><h4 class="card-title">Sign up</h4></header>
                    <form action="{{ route('register') }}" name="frm-login" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                                <input type="text" id="frm-reg-name" class="form-control" name="name"  placeholder="ex. John Doe" required autofocus autocomplete="name">
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <label>Email</label>
                                <input type="email" name="email" id="frm-reg-email" class="form-control"  placeholder="ex. name@gmail.com">
                            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div> <!-- form-group end.// -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Create password</label>
                                <input class="form-control" name="password" id="frm-reg-pass" type="password" required autocomplete="new-password">
                            </div> <!-- form-group end.// --> 
                            <div class="form-group col-md-6">
                                <label>Repeat password</label>
                                <input class="form-control" id="frm-ref-cpass" name="password_confirmation" type="password" required autocomplete="new-password">
                            </div> <!-- form-group end.// -->  
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register" value="Register" class="btn btn-primary btn-block">
                        </div> <!-- form-group// -->      
                        <div class="form-group"> 
                            <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> I am agree with <a href="#">terms and contitions</a>  </div> </label>
                        </div> <!-- form-group end.// -->           
                    </form>
                </article><!-- card-body.// -->
                <p class="text-center mt-2">Have an account? <a href="{{ route('login') }}">Log In</a></p>
            </div> <!-- card .// -->
            
        <!-- ============================ COMPONENT REGISTER  END.// ================================= -->
        </section>
</x-guest-layout>