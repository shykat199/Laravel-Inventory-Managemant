@extends('layouts.app')
@section('content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Invoice</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Moltran</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Invoice</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h4 class="text-right"><img src="{{\Illuminate\Support\Facades\Storage::url($customer->photo)}}" style="height: 40px; width: 40px;" alt="velonic"></h4>
                                    </div>
                                    <div class="pull-right">
                                        <h4>Invoice # <br>
                                            <strong>{{date('d-m-y')}}</strong>
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="pull-left m-t-30">
                                            <address>
                                                <strong>Name: {{$customer->name}}</strong><br>
                                                <strong>Address: {{$customer->address}}</strong><br>
                                                <strong>Shop Name: {{$customer->shopName}}</strong><br>
                                                <strong>Bank Account: {{$customer->bankAccount}}</strong><br>
                                                <abbr title="Phone">P:</abbr> {{$customer->phone}}
                                            </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Order Date: </strong> {{date('F D, Y')}}</p>
                                            <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>

                                            <p class="m-t-10"><strong>Order ID: </strong> #1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-50"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                <tr><th>#</th>
                                                    <th>Item</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Cost</th>
                                                    <th>Total</th>
                                                </tr></thead>
                                                <tbody>
                                                @php
                                                $idx=1;
                                                @endphp
                                                @foreach($cartItems as $cartItem )
                                                    <tr>
                                                        <td>{{$idx++}}</td>
                                                        <td>{{$cartItem->name}}</td>
                                                        <td>{{$cartItem->qty}}</td>
                                                        <td>{{$cartItem->price}}</td>
                                                        <td>{{$cartItem->price*$cartItem->qty}}</td>
                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-radius: 0px;">
                                    <div class="col-md-3 col-md-offset-9">
                                        <p class="text-right"><b>Sub-total:</b> {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</p>
                                        <p class="text-right">VAT: {{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</p>
                                        <hr>
                                        <h3 class="text-right">Total: {{\Gloudemans\Shoppingcart\Facades\Cart::total()}} </h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div> <!-- container -->

        </div> <!-- content -->


    </div>

    <!--Modal Start -->
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Invoice for {{$customer->name}}</h4>
                    <h4>Total: {{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</h4>
                </div>

                <form action="{{url('/pos/create/final-invoice')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="customer_id" value="{{$customer->id}}">
                    <input type="hidden" name="order_date" value="{{date('d-m-y')}}">
                    <input type="hidden" name="order_status" value="pending">
                    <input type="hidden" name="total_products" value="{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}">
                    <input type="hidden" name="sub_total" value="{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}">
                    <input type="hidden" name="vat" value="{{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}">
                    <input type="hidden" name="total" value="{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}">


                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach

                                </ul>
                            </div>
                        @endif


                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Payment Method</label>
                                    <select class="form-control" name="payment_status">
                                        <option disabled="" selected>Select Payment Method</option>
                                        <option value="Hand Cash">Hand Cash</option>
                                        <option value="Cash On Delivery">Cash On Delivery</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Due">Due</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Pay</label>
                                    <input type="text" name="pay" class="form-control" id="field-2" placeholder="Amount...">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Due</label>
                                    <input type="text" name="due" class="form-control" id="field-2" placeholder="Amount...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal -->


@endsection
