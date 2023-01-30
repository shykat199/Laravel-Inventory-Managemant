@extends('layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 bg-info">
                        <h4 class="pull-left page-title text-white">POS (Point Of Sale)</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#" class="text-white">Echovel</a></li>
                            <li class="text-white">{{date('d-m-y')}}</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 class="mb-3">All Categories</h5>
                        <div class="portfolioFilter">
                            @foreach($categories as $category)
                                <a href="" data-filter="*" class="current">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel">
{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="text-info mx-2">Customers </h4>--}}
{{--                                </div>--}}
{{--                                <div class="col mt-2 mx-2">--}}
{{--                                    <a href="" class="btn btn-primary waves-effect waves-light pull-right"--}}
{{--                                       data-toggle="modal" data-target="#con-close-modal">Add New</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <label class="mx-2">All Customers</label>--}}
{{--                                </div>--}}
{{--                                <div class="col mx-2">--}}
{{--                                    <select class="form-control mb-2" name="customer">--}}
{{--                                        <option disabled="" selected>Select Customer</option>--}}
{{--                                        @foreach($customers as $customer)--}}
{{--                                            <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="price_card text-center mt-2">

                                <ul class="price-features">
                                    <table class="table" style="border: 1px solid gray">
                                        <thead class="bg-info">
                                        <tr>
                                            <th class="text-white">Name</th>
                                            <th class="text-white">Qty</th>
                                            <th class="text-white">Single Price</th>
                                            <th class="text-white">Sub Total</th>
                                            <th class="text-white">Action</th>
                                        </tr>
                                        </thead>

                                        @php
                                        $Cart_products=\Gloudemans\Shoppingcart\Facades\Cart::content();
                                        @endphp
                                        <tbody>
                                        @foreach($Cart_products as $product)
                                            <tr>
                                                <th>{{$product->name}}</th>
                                                <th>
                                                    <form action="{{route('pos.cart-update',$product->rowId)}}" method="post">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="number" name="qty" value="{{$product->qty}}" style="width: 40px">
                                                        <button type="submit" class="btn btn-success btn-sm" style="margin-top: -2px">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                </th>
                                                <th>{{$product->price}}</th>
                                                <th>{{$product->price * $product->qty}}</th>

                                                <th><a class="btn btn-danger" href="{{route('pos.product-delete',$product->rowId)}}">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a></th>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </ul>
                                <div class="pricing-footer bg-primary">
                                    <p class="pt-2" style="font-size: 20px">Quantity: {{Cart::count()}}</p>
                                    <p class="pt-2" style="font-size: 20px">Sub Total: {{Cart::subtotal()}}</p>
                                    <p class="pt-2" style="font-size: 20px">Vat: {{Cart::tax()}}</p>
                                    <hr>
                                    <h2 class="text-white pb-2">Total: {{Cart::total()}}</h2>
                                </div>

                                <form action="{{route('pos.create-invoice')}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col">

                                        </div>
                                        <div class="col mt-2 mx-2">
                                            <a href="" class="btn btn-primary waves-effect waves-light pull-right mb-3"
                                               data-toggle="modal" data-target="#con-close-modal">Add New</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="text-info pull-left mx-4">All Customers </h4>
                                        </div>
                                        <div class="col mx-2">
                                            <select class="form-control mb-2" name="customer_id">
                                                <option disabled="" selected>Select Customer</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success ">Create Invoice</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row mt-2">
                            <div class="col-sm-4">
                                <input placeholder="search product...." type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                        <table id="datatable" class="table table-striped table-bordered mt-3">
                            <thead class="">
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product Code</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $id=1;
                            @endphp
                            @foreach($products as $product)
                                <tr>

                                    <form action="{{url('/pos/add-cart')}}" method="post">
                                        @csrf
                                        @method('POST')

                                        <input type="hidden" value="{{$product->id}}" name="id">
                                        <input type="hidden" value="{{$product->name}}" name="name">
                                        <input type="hidden" value="1" name="qty">
                                        <input type="hidden" value="{{$product->selling_price}}" name="price">
                                    <th scope="row">{{$id++}}</th>
                                    <td>
                                        <a href="">
                                            <img
                                                src="{{\Illuminate\Support\Facades\Storage::url($product->product_image)}}"
                                                style="height: 60px" width="60px"/>
                                        </a>
                                    </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->cat_name}}</td>
                                        <td>{{$product->product_code}}</td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i></button></td>
                                    </form>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add New Customer</h4>
                </div>
                <form action="{{url('/customers/create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="field-1" placeholder="Customer Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="field-2" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="field-3" placeholder="Address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="field-4" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Shop Name</label>
                                    <input type="text" name="shopName" class="form-control" id="field-5" placeholder="Shop Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Bank Account</label>
                                    <input type="text" name="bankAccount" class="form-control" id="field-6" placeholder="Bank Account">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group no-margin">
                                    <label for="field-7" class="control-label">Image</label>
                                    <input type="file" name="photo" accept="image/*" class="form-control" id="field-6" onchange="readUrl(this)">
                                    <img id="image" src="#" alt=""/>
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
    </div><!-- /.modal -->

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
