@extends('layouts.app')
@section('content')

    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="panel panel-default">
                        <div style="float: right; padding-top: 10px; padding-right:10px">
                            <a href="{{route('supplier.create')}}" type="submit" class="panel-title btn btn-purple waves-effect waves-light">Add Supplier  &nbsp; <i class="fa-solid fa-user-plus"></i>
                            </a>
                        </div>
                        <div class="panel-heading">
                            <x-header.header-component title="All Suppliers"/>
                        </div>

                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $id=1;
                                @endphp
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <th scope="row">{{$id++}}</th>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->address}}</td>
                                        <td>{{$supplier->email}}</td>
                                        <td>{{$supplier->phone}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{route('supplier.view',$supplier->id)}}" class="btn btn-warning"><i class="fa-sharp fa-solid fa-eye"></i></a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{route('supplier.edit',$supplier->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                </div>
                                                <div class="col">
                                                    <a class="btn btn-danger" href="{{route('supplier.delete',$supplier->id)}}">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
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
