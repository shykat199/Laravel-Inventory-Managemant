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

{{--                        <div style="float: right; padding-top: 10px; padding-right:10px">--}}
{{--                            <a href="{{route('products.create')}}" type="submit"--}}
{{--                               class="panel-title btn btn-purple waves-effect waves-light">Add Product &nbsp; <i--}}
{{--                                    class="fa-solid fa-user-plus"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <div class="panel-heading">
                            <x-header.header-component title="Pending Orders"/>
                        </div>

                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Order Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $id=1;
                                @endphp
                                @foreach($pendingOrders as $order)
                                    <tr>
                                        <th scope="row">{{$id++}}</th>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->order_date}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>{{$order->payment_status}}</td>
                                        <td><span class="badge badge-warning  text-bold">{{$order->order_status}}</span></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6 col-md-4">
                                                    <a href="{{url('/orders',$order->id)}}"
                                                       class="btn btn-warning"><i class="fa-sharp fa-solid fa-eye"></i></a>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <form
                                                        method="POST"
                                                        action="{{route('orders.destroy',$order->id)}}"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </div>

                                            </div>
                                        </td>
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
