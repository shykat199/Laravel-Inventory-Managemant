@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">

                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">
                            <span
                                class="font-medium">Success Alert! &nbsp; {{\Illuminate\Support\Facades\Session::get('success')}}</span>
                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Session::has('warning'))
                        <div class="alert alert-danger">
                            <span class="font-medium">Warning Alert! &nbsp; {{\Illuminate\Support\Facades\Session::get('warning')}}</span>
                        </div>
                    @endif
                    <div class="panel panel-info">
                        <div style="float: right; padding-top: 10px; padding-right:10px">
                            <button type="submit" class="panel-title btn btn-purple waves-effect waves-light">Update
                            </button>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Update Category</h3>
                        </div>

                        <div class="panel-body">
                            <form role="form" action="{{route('categories.update',$category->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="year">Category Name</label>
                                    <input type="text" name="name" class="form-control" id="year"
                                           value="{{$category->name}}"
                                           placeholder="Enter Category Name">
                                </div>

                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- panel-body -->
            </div> <!-- panel -->
        </div>
    </div>

    <script>
        function readUrl(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
