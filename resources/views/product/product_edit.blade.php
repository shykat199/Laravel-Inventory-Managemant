@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-md-1"></div>
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
                                    <form action="{{route('products.update',$product->id)}}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <div class="row">

                                            <div class="col-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Product Name</label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                           value="{{$product->name}}"
                                                           placeholder="Enter Name">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="type">Category</label>
                                                    <select name="category_id" id="" class="form-control">
                                                        <option selected>Select A Option</option>
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{$category->id}}"{{$category->id === $product->category_id ? 'selected':''}}>{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="type"> Supplier Name</label>
                                                    <label for=""></label><select name="suplier_id" id=""
                                                                                  class="form-control">
                                                        <option selected>Select A Option</option>
                                                        @foreach($suppliers as $supplier)
                                                            <option
                                                                value="{{$supplier->id}}"{{$supplier->id === $product->suplier_id ? 'selected':''}}>{{$supplier->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="phone">Product Code</label>
                                                    <input type="text" name="product_code" class="form-control" id="phone"
                                                           value="{{$product->product_code}}"
                                                           placeholder="Enter Product Code">
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="address">Product Warehouse</label>
                                                    <input type="text" name="product_warehouse" class="form-control" id="address"
                                                           value="{{$product->product_warehouse}}"
                                                           placeholder="Enter Address">
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="experience">Product Route</label>
                                                    <input type="text" name="product_route" class="form-control"
                                                           id="experience"
                                                           value="{{$product->product_route}}"
                                                           placeholder="Enter Experience">
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="salary">Buying Date</label>
                                                    <input type="date" name="buy_date" class="form-control"
                                                           id="salary"
                                                           value="{{$product->buy_date}}"
                                                           placeholder="Enter Salary">
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="salary">Buying Price</label>
                                                    <input type="text" name="buying_price" class="form-control"
                                                           id="salary"
                                                           value="{{$product->buying_price}}"
                                                           placeholder="Enter Salary">
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="salary">Selling Price</label>
                                                    <input type="text" name="selling_price" class="form-control"
                                                           id="salary"
                                                           value="{{$product->selling_price}}"
                                                           placeholder="Enter Salary">
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="salary">Expire Date</label>
                                                    <input type="date" name="expire_date" class="form-control"
                                                           id="salary"
                                                           value="{{$product->expire_date}}"
                                                           placeholder="Enter Salary">
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4">
                                                <label for="photo">Photo</label> <br>
                                                <div class="flex items-center justify-center">
                                                    <input type="file" name="product_image" accept="image/*"
                                                           class="form-control"
                                                           id="product_image"
                                                           onchange="readUrl(this)">
                                                    <img id="image"
                                                         src="{{\Illuminate\Support\Facades\Storage::url($product->product_image)}}"
                                                         style="height: 100px; width: 100px" alt=""/>
                                                </div>
                                            </div>

                                            <div>
                                                <button type="submit" class="btn btn-purple waves-effect waves-light">
                                                    Update
                                                </button>

                                            </div>

                                        </div>
                                    </form>
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
