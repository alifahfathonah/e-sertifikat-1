@extends('SuperAdmin.Layouts.app')

@section('css')

@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h2 style="color: #e66767">Data Menu</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn" style="background-color: #e66767; color: #fff" href="/dapur/super/menu/add" role="button">Add Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead class="bg-primary" style="color: #ffff;">
                    <tr>
                        <th style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></th>
                        <th>Name</th>
                        <th>Uri</th>
                        <th>Icon</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $menu)
                    <tr>
                        <td style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></td>
                        <td>{!!$menu->name!!}</td>
                        <td>{!!$menu->uri!!}</td>
                        @if ($menu->icon == null)
                        <td> <img src="{{asset('assets/img/no-image.jpg')}}" class="img-fluid" alt="Responsive image" width="50"> </td>
                        @else
                        <td><img src="{{asset('menus_icon/'.$menu->icon)}}" class="img-fluid" alt="Responsive image" width="50"></td>
                        @endif
                        @if ($menu->is_active == 0)
                        <td>
                            <label class="custom-toggle">
                                <input id="{!!$menu->id!!}" type="checkbox">
                                <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON" ></span>
                            </label>
                        </td>
                        @else
                        <td>
                            <label class="custom-toggle">
                                <input id="{!!$menu->id!!}" type="checkbox" checked>
                                <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON" ></span>
                            </label>
                        </td>
                        @endif
                        <td>
                            <a style="margin-right: 20px;" href="{{url()->current().'/'.$menu->id.'/edit'}}"><i class="fa fa-edit" style="font-size: 21px; color: #e66767"></i></a>
                            <a style="margin-right: 10px;" href="{{url()->current().'/'.$menu->id.'/delete'}}"><i class="fa fa-trash" style="font-size: 21px; color: #e66767"></i></a>
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
        $("#menu").addClass("active");
    });
</script>

<script type="text/javascript">
    @if ($message = Session::get('created'))
            iziToast.success({
                        title: 'Success',
                        message: 'Data berhasil disimpan',
                        position: 'topRight'
                    });
    @endif
</script>
<script type="text/javascript">
    @if ($message = Session::get('updated'))
            iziToast.success({
                        title: 'Success',
                        message: 'Data berhasil diubah',
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
    @if ($message = Session::get('warning'))
            iziToast.error({
                        title: 'Failed',
                        message: 'Data gagal diproses',
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
        axios.post('/dapur/menu/activation', {
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
