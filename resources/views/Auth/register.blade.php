@extends('Auth.layout')

@section('css')

@endsection

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-50 p-b-90">
            <form class="login100-form validate-form flex-sb flex-w" >
                @csrf
                <span class="login100-form-title p-b-51">
                    Sign Up
                </span>

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required" style="visibility: hidden; position: absolute;">
                    <input class="input100" type="text" id="is_active" name="is_active" value="0">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Name is required">
                    <input class="input100" type="text" id="name" name="name" placeholder="Your name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
                    <input class="input100" type="text" id="username" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                </div>
                

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
                    <input class="input100" type="email" id="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                </div>

                
                <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn" type="button" id="buttonku">
                        Sign Up
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
@endsection


@section('js')

<script type="text/javascript">
    $(document).ready(function(){

        $("#buttonku").click(function(){
            var active = 0;
            var name = document.getElementById("name").value;
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            var datausername = [];
            var dataemail = [];

            axios.get('/api/data-user')
            .then(function (response) {
                // handle success
                var users = response.data.datausers;
                for (var i = 0; i < users.length; i++) {
                    dataemail.push(users[i].email);
                    datausername.push(users[i].username);
                }

                if ( $.inArray(username, datausername) > -1 ) {
                    iziToast.error({
                        message: 'Username sudah digunakan',
                        position: 'topRight'
                    });
                }else if ( $.inArray(email, dataemail) > -1 ) {
                    iziToast.error({
                        message: 'Email sudah digunakan',
                        position: 'topRight'
                    });
                }else {
                    signup();
                }
                
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });

            function signup(){
                axios.post('/postsignup', {
                    is_active: active,
                    name: name,
                    username: username,
                    email: email,
                    password: password,
                })
                .then(function (response) {
                    swal("Registrasi berhasil, silahkan Login.", {
                        closeOnClickOutside: false,
                    })
                    .then((value) => {
                        if(value == true){
                            window.location.href = '/login';
                        }
                    });
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            
        });
    });
</script>

@endsection