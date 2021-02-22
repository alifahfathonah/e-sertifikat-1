<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">

    <title>My Profile</title>
  </head>
  <body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="{{asset('assets/img/profile-edit-top.png')}}" class="img-fluid" alt="Responsive image">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 offset-md-3" style="padding-top: 2%;">
                <div class="row">
                    <div class="col-md-6" style="padding-top: 10%;">
                        <h1>My Profile</h1>
                    </div>
                    <div class="col-md-6">
                        @if ($data->photo == null)
                        <img src="{{asset('assets/img/no-image.jpg')}}" class="rounded float-right" width="130" style="margin-bottom: 5%;">
                        @else
                        <img src="{{asset('profile_pictures/'.$data->photo)}}" class="rounded float-right" width="130" style="margin-bottom: 5%;">
                        @endif

                    </div>
                </div>

                <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row">Nama</th>
                        <td>: {!! $data->name !!}</td>
                      </tr>
                      <tr>
                        <th scope="row">Username</th>
                        <td>: {!! $data->username !!}</td>
                      </tr>
                      <tr>
                        <th scope="row">Email</th>
                        <td>: {!! $data->email !!}</td>
                      </tr>
                    </tbody>
                </table>
                <div class="row" style="float: right">
                    <div class="col-md-5">
                      <a class="btn btn-warning" href="/dapur/user-profile/{!! $data->id !!}/edit" role="button">Edit</a>
                    </div>
                    <div class="col-md-5">
                        <a class="btn btn-secondary" href="/dapur" role="button">Back</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <img src="{{asset('assets/img/profile-edit-side.png')}}" height="300" alt="Responsive image">
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
