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
                    <h2 class="text-primary">Data Roles</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="/dapur/super/roles/add" role="button">Add Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead class="bg-primary" style="color: #ffff;">
                    <tr>
                        <th style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $role)
                    <tr>
                        <td style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></td>
                        <td>{!!$role->name!!}</td>
                        <td>
                            <a style="margin-right: 20px;" href="{{url()->current().'/'.$role->id.'/edit'}}"><i class="fa fa-edit text-primary" style="font-size: 21px;"></i></a>
                            <a style="margin-right: 10px;" href="{{url()->current().'/'.$role->id.'/delete'}}"><i class="fa fa-trash text-primary" style="font-size: 21px;"></i></a>
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
        $("#roles").addClass("active");
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