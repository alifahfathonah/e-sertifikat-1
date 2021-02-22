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
                    <h2 style="color: #e66767">Data Permissions</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn" href="/dapur/super/permission/add" role="button" style="color: #fff; background-color: #e66767">Add Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead class="bg-primary" style="color: #ffff;">
                    <tr>
                        <th style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></th>
                        <th>Roles Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rol as $role)
                    <tr>
                        <td style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></td>
                        <td>{!!$role->name!!}</td>
                        {{-- <td>
                            <a class="btn btn-success btn-sm" href="{{url()->current().'/'.$role->id.'/show'}}" role="button">View</a>
                        </td>
                        <td>
                            <a style="margin-right: 10px;" href="{{url()->current().'/'.$role->id.'/delete'}}"><i class="fa fa-trash text-primary" style="font-size: 21px;"></i></a>
                        </td> --}}
                        <td>
                            <a style="margin-right: 20px;" href="{{url()->current().'/'.$role->id.'/show'}}"><i class="fa fa-eye" style="font-size: 21px; color: #e66767"></i></a>
                            <a style="margin-right: 10px;" href="{{url()->current().'/'.$role->id.'/delete'}}"><i class="fa fa-trash" style="font-size: 21px; color: #e66767"></i></a>
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
        $("#permission").addClass("active");
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

@endsection
