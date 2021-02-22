@extends('SuperAdmin.Layouts.app')

@section('css')
<style>
    .select-formhide {
        display: none;
    }
    .select-formshow {
        display: flex;
    }
</style>
@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card">
        <div class="card-header">
          <h2 style="color: #e66767">Add Menu Data</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="/dapur/super/menu/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container" style="margin-top: -10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Menu Type</label>
                                <select class="form-control" name="type" id="menu-type" onchange="menutype()">
                                    <option value="">-- Select --</option>
                                    <option value="parent">Parent</option>
                                    <option value="child">Child</option>
                                    <option value="primary">Primary</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row select-formhide" id="select_parent">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Select Parent</label>
                                <select class="form-control" name="parent_id">
                                    <option value="">-- Select --</option>
                                    @foreach ($data as $item)
                                    <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Menu's name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Uri</label>
                                <input type="text" class="form-control" id="uri" name="uri" placeholder="uri">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInput">Upload Menu's Icon</label>
                                <div class="tower-file">
                                    <input type="file" name="gambar" id="demoInput5" />
                                    <label for="demoInput5" class="btn" style="background-color: #e66767; color: #fff">
                                        <span class="mdi mdi-upload"></span>Select Files
                                    </label>
                                    <button type="button" class="tower-file-clear btn btn-secondary align-top">
                                        Clear
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Visibility</label>
                                <select class="form-control" name="is_active">
                                    <option value="">-- Select --</option>
                                    <option value="1">True</option>
                                    <option value="0">False</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="float: right; margin-top: 20px;">
                                <input class="btn" style="background-color: #e66767; color: #fff" type="submit" value="Save">
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
        $("#menu").addClass("active");
    });
</script>

<script type="text/javascript">
    $('#demoInput5').fileInput({
        iconClass: 'mdi mdi-fw mdi-upload'
    });
</script>

<script>
    $(document).ready(function(){
      $("#name").change(function(){
        var name = document.getElementById('name').value;
        var uri = name.replace(/\s+/g, '-').toLowerCase();
        document.getElementById('uri').value = uri;
      });
    });
</script>

<script>
    function menutype() {
        var i = document.getElementById("menu-type").value;
        // console.log(i);
        if(i === "child"){
            $('#select_parent').removeClass("select-formhide");
            $('#select_parent').addClass("select-formshow");
        }else {
            $('#select_parent').removeClass("select-formshow");
            $('#select_parent').addClass("select-formhide");
        }
    }
</script>
@endsection
