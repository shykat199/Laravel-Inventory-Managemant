@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="panel panel-default">
                        <div style="float: right; padding-top: 10px; padding-right:10px">
                            <a href="{{route('orders.index')}}" type="submit"
                               class="panel-title btn btn-purple waves-effect waves-light"> <i
                                    class="fa-solid fa-backward-step"></i> Back
                            </a>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Order</h3>
                        </div>

                        <div class="panel-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="name">Customer Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                   value="{{$orderDetails->name}}"
                                                   placeholder="Enter Name" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Order Date</label>
                                            <input type="email" name="email" class="form-control"
                                                   id="exampleInputEmail1" value="{{$orderDetails->order_date}}"
                                                   placeholder="Enter email" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Order Status</label>
                                            <input type="text" name="phone" class="form-control" id="phone"
                                                   value="{{$orderDetails->order_status}}"
                                                   placeholder="Enter Phone Number" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Total Product</label>
                                            <input type="text" name="phone" class="form-control" id="phone"
                                                   value="{{$orderDetails->total_products}}"
                                                   placeholder="Enter Phone Number" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Payment Method</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                   value="{{$orderDetails->payment_status}}"
                                                   placeholder="Enter Address" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="experience">Sub Total</label>
                                            <input type="text" name="shopName" class="form-control" id="experience"
                                                   value="{{$orderDetails->sub_total}}"
                                                   placeholder="Enter Experience" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="salary">Vat</label>
                                            <input type="text" name="bankAccount" class="form-control" id="salary"
                                                   value="{{$orderDetails->vat}}"
                                                   placeholder="Enter Salary" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="salary">Total</label>
                                            <input type="text" name="bankAccount" class="form-control" id="salary"
                                                   value="{{$orderDetails->total}}"
                                                   placeholder="Enter Salary" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="salary">Pay</label>
                                            <input type="text" name="bankAccount" class="form-control" id="salary"
                                                   value="{{$orderDetails->pay}}"
                                                   placeholder="Enter Salary" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="salary">Due</label>
                                            <input type="text" name="bankAccount" class="form-control" id="salary"
                                                   value="{{$orderDetails->due}}"
                                                   placeholder="Enter Salary" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Product Code</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total</th>
                                            </tr></thead>
                                            <tbody>
                                            @php
                                                $idx=1;
                                            @endphp
                                            @foreach($odetails as $odetail )
                                                <tr>
                                                    <td>{{$idx++}}</td>
                                                    <td>{{$odetail->name}}</td>
                                                    <td>{{$odetail->product_code}}</td>
                                                    <td>{{$odetail->quantity}}</td>
                                                    <td>{{$odetail->unitcost}}</td>
                                                    <td>{{$odetail->unitcost*$odetail->quantity}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-3 col-md-offset-9">
                                    <p class="text-right"><b>Sub-total:</b> {{$orderDetails->sub_total}}</p>
                                    <p class="text-right">VAT: {{$orderDetails->vat}}</p>
                                    <hr>
                                    <h3 class="text-right">Total: {{$orderDetails->total}} </h3>
                                </div>
                            </div>
                            @if($orderDetails->order_status==='approve')
                            @else
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="{{url('/orders/update',$orderDetails->id)}}" type="submit" class="btn btn-primary waves-effect waves-light">Accept</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- panel-body -->
            </div> <!-- panel -->
        </div>
    </div>

@endsection
