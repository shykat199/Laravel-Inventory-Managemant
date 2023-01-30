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
                            <button type="button" data-toggle="modal" data-target="#exampleModal"
                                    class="panel-title btn btn-purple waves-effect waves-light">Add Category &nbsp<i
                                    class="fa-solid fa-user-plus"></i>
                            </button>
                        </div>


                        <div class="panel-heading">

                            <x-header.header-component title="All Category"/>

                        </div>


                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $id=1;
                                @endphp
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{$id++}}</th>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <div class="row">

                                                <div class="col col-lg-2">

                                                    <a type="submit" href="{{route('categories.edit',$category->id)}}"
                                                       class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                </div>

                                                <div class="col col-lg-2">

                                                    <form
                                                        method="POST"
                                                        action="{{route('categories.destroy',$category->id)}}"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </div>

                                            </div>


                                    </tr>
                                @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <!-- panel-body -->
            </div> <!-- panel -->
        </div>
    </div>

@endsection

<!--Boostrap Modal-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="Enter Name">
                    </div>
                    <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--End Boostrap Modal-->
