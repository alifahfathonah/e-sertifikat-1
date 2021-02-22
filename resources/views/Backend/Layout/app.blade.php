
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <title>Acara</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" /> --}}
  <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/vendor/select2/dist/css/select2.min.css')}}" type="text/css">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">

  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tower-file-input.css') }}">
  <style>
    #preloader {
      position: fixed;
      height: 100%;
      width: 100%;
      top: 0;
      left: 0;
      background: #fff;
      z-index: 9999;
      font-size: 65px;
      text-align: center;
      padding-top: 200px;
      font-family:tahoma;
    }
  </style>
  @yield('css')
</head>

<body>
  {{-- <div class="text-center" id="preloader">
    <img src="{{asset('assets/img/Spin.gif')}}" width="90" alt="">
    <p>Loading ...</p>
  </div> --}}
  @include('Backend.Layout.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    @include('Backend.Layout.navbar')
    @yield('content')
    @include('Backend.Layout.footer')
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <script>
    $(window).on('load', function () {
      $("#preloader").fadeOut(100);
    });
  </script>
  <script src="{{asset('assets/vendor/select2/dist/js/select2.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
  <script src="{{ asset('assets/js/iziToast.js') }}"></script>
  <script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#datatable').DataTable({
        "language": {
                "paginate": {
                "previous": "&lt",
                "next": "&gt"
                }
            },
      });
    } );
  </script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="{{ asset('assets/js/tower-file-input.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
  @yield('js')
</body>

</html>
