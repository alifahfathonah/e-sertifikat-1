@extends('SuperAdmin.Layouts.app')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.css" rel="stylesheet">
@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card">
        <div class="card-header">
          <h2 style="color: #e66767">View Permission For Role</h2>
        </div>
        <div class="card-body">
            <form >
                <div class="container" style="margin-top: -10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Role Name</label>
                                    <input type="text" class="form-control" id="name" name="role" placeholder="Role's name" value="{!!$role->name!!}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-sm">
                                <thead class="borderless">
                                  <tr class="text-center" style="background-color: #fab0af">
                                    <th colspan="5" style="font-weight: bold; font-size: 11px;">Permission</th>
                                  </tr>
                                  <tr class="table-light">
                                    <th scope="col" style="font-weight: bold; font-size: 11px;">Menu</th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;">View</th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;">Create</th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;">Edit</th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;">Delete</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    @if ($item->is_active == 1)
                                    <tr>
                                        <td>{!! $item->name !!}</td>
                                        @foreach ($value as $permission)
                                            @if ($permission->menu_id == $item->id)
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" disabled><i class="ni ni-check-bold text-secondary"></i></button>
                                            </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="float: right; margin-top: 20px;">
                                <a class="btn" style="background-color: #f5cd79; color: #fff" href="{{url('/dapur/super/permission/'.$role->id.'/edit')}}" role="button">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.js"></script>

<script>
    $(document).ready(function() {
        new SlimSelect({
            select: '#slimselect',
        })
    });
</script>
<script>
    $(document).ready(function() {
        new SlimSelect({
            select: '#slimselectmulti',
            placeholder: 'Select Permissions',
        })
    });
</script>
@endsection
