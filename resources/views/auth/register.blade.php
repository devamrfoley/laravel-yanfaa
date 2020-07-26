@extends('layouts.app')

@section('content')
<section id="aa-myaccount">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-myaccount-register">                 
                                <h4>Register</h4>
                                <form method="POST" action="{{ route('register') }}" class="aa-login-form">
                                    @csrf
                                    
                                    <label for="">Username or Email address<span>*</span></label>
                                    <input type="text" name="name" placeholder="Name"  value="{{ old('name') }}" required />
                                    
                                    <label for="">Username or Email address<span>*</span></label>
                                    <input type="text" name="email" placeholder="Username or email"  value="{{ old('email') }}" required />
                                    
                                    <label for="">Password<span>*</span></label>
                                    <input type="password" placeholder="Password" name="password" required />
                                    
                                    <label for="">Confirm password<span>*</span></label>
                                    <input type="password" placeholder="Confirm password" name="password_confirmation" required />
                                    
                                    <div>
                                        <button type="submit" class="aa-browse-btn">Register</button>
                                        <a href="{{ route('login') }}" class="aa-primary-btn" style="padding: 6px 30px">login</a>
                                    </div>
                                </form>
                            </div>
                            <!-- <h5>or <a href="">has account?</a></h5> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            @forelse($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
