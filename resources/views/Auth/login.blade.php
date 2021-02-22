@extends('Auth.layout')

@section('css')

@endsection

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-50 p-b-90">
            <form class="login100-form validate-form flex-sb flex-w" action="/postlogin" method="POST">
                @csrf
                <span class="login100-form-title p-b-51">
                    Login
                </span>

                
                <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                </div>
                
                
                <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn" type="submit" >
                        Login
                    </button>
                </div>

                <div class="container" style="margin-top: 5%;">
                    <div class="row">
                        <div class="col-md-8">
                            <p>Don't have account?</p>
                        </div>
                        <div class="col-md-4">
                            <a href="/signup"><p style="color: #546de5; font-weight: bold;">Sign Up</p></a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
@endsection

@section('js')

<script type="text/javascript">
    @if ($message = Session::get('regisok'))
            iziToast.success({
                        title: 'Success',
                        message: 'SignUp is successfull, please login',
                        position: 'topRight'
                    });
    @endif
</script>
<script type="text/javascript">
    @if ($message = Session::get('error'))
            iziToast.error({
                        title: 'Failed',
                        message: 'Username dan password tidak cocok',
                        position: 'topRight'
                    });
    @endif
</script>

@endsection