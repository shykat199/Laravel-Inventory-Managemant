@extends('layouts.app')
@section('content')

    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-11">
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">
                            <span
                                class="font-medium">Success Alert! &nbsp; {{\Illuminate\Support\Facades\Session::get('success')}}</span>
                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Session::has('warning'))
                        <div class="alert alert-danger">
                            <span
                                class="font-medium">Warning Alert!{{\Illuminate\Support\Facades\Session::get('warning')}}</span>
                        </div>
                    @endif

                    <div class="panel panel-default">

                        <div style="float: right; padding-top: 10px; padding-right:10px">
                            <a href="{{route('product.export')}}" class="panel-title btn btn-purple waves-effect waves-light">Download File &nbsp<i
                                    class="fa-solid fa-user-plus"></i>
                            </a>
                        </div>


                        <div class="panel-heading">

                            <x-header.header-component title="Mass Input Products"/>

                        </div>


                        <div class="panel-body">
                            <form role="form" action="{{route('product.import')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="upload_file">Import XLSX File</label>
                                    <input type="file" name="upload_file" class="form-control" id="upload_file">
                                </div>
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- panel-body -->
            </div> <!-- panel -->
        </div>
    </div>

@endsection

