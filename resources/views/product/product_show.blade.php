@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="panel panel-default">
                        <div style="float: right; padding-top: 10px; padding-right:10px">
                            <a href="{{route('products.index')}}" type="submit"
                               class="panel-title btn btn-purple waves-effect waves-light"> <i
                                    class="fa-solid fa-backward-step"></i> Back
                            </a>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Product</h3>
                        </div>

                        <div class="panel-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                   value="{{$product->name}}"
                                                   placeholder="Enter Name" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Category</label>
                                            <input type="email" name="email" class="form-control"
                                                   id="exampleInputEmail1" value="{{$product->cat_name}}"
                                                   placeholder="Enter email" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Supplier Name</label>
                                            <input type="text" name="phone" class="form-control" id="phone"
                                                   value="{{$product->sup_name}}"
                                                   placeholder="Enter Phone Number" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Product Code</label>
                                            <input type="text" name="phone" class="form-control" id="phone"
                                                   value="{{$product->product_code}}"
                                                   placeholder="Enter Phone Number" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Product Warehouse</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                   value="{{$product->product_warehouse}}"
                                                   placeholder="Enter Address" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="experience">Product Route</label>
                                            <input type="text" name="shopName" class="form-control" id="experience"
                                                   value="{{$product->product_route}}"
                                                   placeholder="Enter Experience" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="salary">Buying Date</label>
                                            <input type="text" name="bankAccount" class="form-control" id="salary"
                                                   value="{{$product->buy_date}}"
                                                   placeholder="Enter Salary" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="salary">Buying Price</label>
                                            <input type="text" name="bankAccount" class="form-control" id="salary"
                                                   value="{{$product->buying_price}}"
                                                   placeholder="Enter Salary" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="salary">Selling Price</label>
                                            <input type="text" name="bankAccount" class="form-control" id="salary"
                                                   value="{{$product->selling_price}}"
                                                   placeholder="Enter Salary" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="salary">Expire Date</label>
                                            <input type="text" name="bankAccount" class="form-control" id="salary"
                                                   value="{{$product->expire_date}}"
                                                   placeholder="Enter Salary" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <label for="photo">Photo</label> <br>
                                        <div class="flex items-center justify-center">
                                            <img id="image"
                                                 src="{{\Illuminate\Support\Facades\Storage::url($product->product_image)}}"
                                                 style="height: 100px; width: 100px" alt=""/>
                                        </div>

                                    </div>


                                </div>
                            </div>
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
