@extends('SuperAdmin.Layouts.app')

@section('css')
    
@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card">
        <div class="card-header">
          <h2 class="text-primary">Data User</h2>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead class="bg-primary" style="color: #ffff;">
                    <tr>
                        <th style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Picture</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                    <tr>
                        <td style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></td>
                        <td>{!!$user->name!!}</td>
                        <td>{!!$user->username!!}</td>
                        <td>{!!$user->email!!}</td>
                        @if ($user->roles_id == null)
                        <td>----</td>
                        @else
                        <td>{!!$user->role->name!!}</td>
                        @endif
                        @if ($user->photo == null)
                        <td> <img src="{{asset('assets/img/no-image.jpg')}}" class="img-fluid" alt="Responsive image" width="50"> </td>
                        @else
                        <td><img src="{{asset('profile_pictures/'.$user->photo)}}" class="img-fluid" alt="Responsive image" width="50"></td>
                        @endif
                        @if ($user->is_active == 0)
                        <td>
                            <label class="custom-toggle">
                                <input id="{!!$user->id!!}" type="checkbox">
                                <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON" ></span>
                            </label>
                        </td>
                        @else
                        <td>
                            <label class="custom-toggle">
                                <input id="{!!$user->id!!}" type="checkbox" checked>
                                <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON" ></span>
                            </label>
                        </td>
                        @endif
                        <td>
                            <a style="margin-right: 20px;" href="{{url()->current().'/'.$user->id.'/edit'}}"><i class="fa fa-edit text-primary" style="font-size: 21px;"></i></a>
                            <a style="margin-right: 10px;" href="{{url()->current().'/'.$user->id.'/delete'}}"><i class="fa fa-trash text-primary" style="font-size: 21px;"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>    
@endsection

@section('js')
<script>
    $(document).ready(function() {   
        $("#users").addClass("active");
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

@foreach ($data as $cek)
<script>
    $(function() {
      $('#{!! $cek->id !!}').change(function(event) {
        var status = ($(this).prop('checked')) ? '1' : '0';
        var id = event.target.id;
        var is_active = status;
        // console.log(id);
        // console.log(status);
        axios.post('/dapur/super/activation', {
            is_active: is_active,
            id: id
        })
        .then(function (response) {
            iziToast.success({
                title: 'Success',
                message: 'Proses Berhasil',
                position: 'topRight'
            });
        })
        .catch(function (error) {
            iziToast.warning({
                title: 'Upps !',
                message: 'Proses Gagal',
                position: 'topRight'
            });
        });
      })
    })
</script>
@endforeach

@endsection