@extends('layouts.app')

@section('content')

<section id="aa-myaccount">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-myaccount-login">
                                <h4>Login or Register</h4>
                                <form class="aa-login-form" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    
                                    <label for="">Username or Email address<span>*</span></label>
                                    <input type="text" placeholder="Username or email"  name="email" value="{{ old('email') }}" required />
                                    
                                    <label for="">Password<span>*</span></label>
                                    <input type="password" placeholder="Password" name="password" required />
                                    
                                    <button class="aa-browse-btn" type="submit">Login</button>
                                    
                                    <label for="rememberme" class="rememberme">
                                        <input type="checkbox" id="rememberme" name="remember" {{ old('remember') ? 'checked' : '' }} />Remember me
                                    </label>
                                    <p class="aa-lost-password"><a href="{{ route('password.request') }}">Lost your password?</a></p>
                                    <div class="aa-register-now">
                                        Don't have an account?<a href="{{ route('register') }}">Register now!</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
