@extends('SuperAdmin.Layouts.app')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.css" rel="stylesheet">
@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card">
        <div class="card-header">
          <h2 style="color: #e66767">Add Permission For Role</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="/dapur/super/permission/create">
                {{ csrf_field() }}
                <div class="container" style="margin-top: -10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Role Give Permission</label>
                                <select name="role_id" id="slimselect">
                                    <option value=""> --Select Role-- </option>
                                    @foreach ($role as $item)
                                    <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                                    @endforeach
                                </select>
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
                                        <td>
                                            <label class="custom-toggle">
                                            <input type="checkbox" name="permission[]" value="{!! "/".Str::lower($item->name)."/view" !!}">
                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="custom-toggle">
                                            <input type="checkbox" name="permission[]" value="{!! "/".Str::lower($item->name) ."/create" !!}">
                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="custom-toggle">
                                            <input type="checkbox" name="permission[]" value="{!! "/".Str::lower($item->name) ."/edit" !!}">
                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="custom-toggle">
                                            <input type="checkbox" name="permission[]" value="{!! "/".Str::lower($item->name) ."/delete" !!}">
                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                            </label>
                                        </td>
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
                                <input class="btn" style="background-color: #e66767; color:#fff" type="submit" value="Save">
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
