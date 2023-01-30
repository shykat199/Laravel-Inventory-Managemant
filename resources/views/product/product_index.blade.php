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
                            <a href="{{route('products.create')}}" type="submit"
                               class="panel-title btn btn-purple waves-effect waves-light">Add Product &nbsp; <i
                                    class="fa-solid fa-user-plus"></i>
                            </a>
                        </div>
                        <div class="panel-heading">
                            <x-header.header-component title="All Products"/>
                        </div>

                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product_Code</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Selling Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $id=1;
                                @endphp
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row">{{$id++}}</th>
                                        <td>{{$product->name}}</td>
                                        <td>
                                            <img style="height: 70px; width: 70px" src="{{\Illuminate\Support\Facades\Storage::url($product->product_image)}}" alt="">
                                        </td>
                                        <td>{{$product->product_code}}</td>
                                        <td>{{$product->product_warehouse}} &nbsp; {{$product->product_route}}</td>
                                        <td>{{$product->selling_price}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6 col-md-4">
                                                    <a href="{{route('products.show',$product->id)}}"
                                                       class="btn btn-warning"><i class="fa-sharp fa-solid fa-eye"></i></a>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <a href="{{route('products.edit',$product->id)}}"
                                                       class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <form
                                                        method="POST"
                                                        action="{{route('products.destroy',$product->id)}}"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </form>
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
