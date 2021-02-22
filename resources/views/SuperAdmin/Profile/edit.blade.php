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

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tower-file-input.css') }}">

    <title>Edit My Profile</title>
  </head>
  <body>

    <div class="container" style="margin-bottom: 5%">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="{{asset('assets/img/profile-edit-top.png')}}" class="img-fluid" alt="Responsive image">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 offset-md-3" style="padding-top: 2%;">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Edit Profile</h1>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>

                <form method="POST" action="/dapur/user-profile/{!!$data->id!!}/update" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <table class="table">
                        <tbody>
                        <tr>
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{!! $data->name !!}">
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{!! $data->username !!}">
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label for="email">Alamat Email Aktif</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{!! $data->email !!}">
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label for="exampleInput">Upload Photo profile</label>
                                <div class="tower-file">
                                    <input type="file" name="gambar" id="demoInput5" />
                                    <label for="demoInput5" class="btn btn-primary">
                                        <span class="mdi mdi-upload"></span>Select Files
                                    </label>
                                    <button type="button" class="tower-file-clear btn btn-secondary align-top">
                                        Clear
                                    </button>
                                </div>
                            </div>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row" style="float: right">
                        <div class="col-md-5">
                            <input class="btn btn-primary" type="submit" value="Save">
                        </div>
                        <div class="col-md-5">
                            <a class="btn btn-secondary" href="/dapur" role="button">Back</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <img src="{{asset('assets/img/profile-edit-side.png')}}" height="300" alt="Responsive image">
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <script src="{{ asset('assets/js/iziToast.js') }}"></script>
    <script src="{{ asset('assets/js/iziToast.min.js') }}"></script>

    <script src="{{ asset('assets/js/tower-file-input.js') }}"></script>

    <script type="text/javascript">
        $('#demoInput5').fileInput({
            iconClass: 'mdi mdi-fw mdi-upload'
        });
    </script>

    <script type="text/javascript">
        @if ($message = Session::get('updated'))
                iziToast.success({
                            title: 'Success',
                            message: 'Data berhasil diperbaharui',
                            position: 'topRight'
                        });
        @endif
    </script>
    <script type="text/javascript">
        @if ($message = Session::get('deleted'))
                iziToast.success({
                            title: 'Success',
                            message: 'Data berhasil dihapus',
                            position: 'topRight'
                        });
        @endif
    </script>
    <script type="text/javascript">
        @if ($message = Session::get('error'))
                iziToast.error({
                            title: 'Error',
                            message: 'Gagal memproses',
                            position: 'topRight'
                        });
        @endif
    </script>

  </body>
</html>
