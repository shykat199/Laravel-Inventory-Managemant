@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">

                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">
                            <span
                                class="font-medium">Success Alert! &nbsp; {{\Illuminate\Support\Facades\Session::get('success')}}</span>
                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Session::has('warning'))
                        <div class="alert alert-danger">
                            <span
                                class="font-medium">Warning Alert! &nbsp; {{\Illuminate\Support\Facades\Session::get('warning')}}</span>
                        </div>
                    @endif
                    <div class="panel panel-info">
                        <div style="float: right; padding-top: 10px; padding-right:10px">
                            <button type="submit" class="panel-title btn btn-purple waves-effect waves-light">Submit
                            </button>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Add Salary</h3>
                        </div>

                        <div class="panel-body">
                            <form role="form" action="{{route('products.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Enter Product Name">
                                </div>

                                <div class="form-group">
                                    <label for="type">Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        <option selected>Select A Option</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="type"> Supplier Name</label>
                                    <select name="suplier_id" id="" class="form-control">
                                        <option selected>Select A Option</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="product_code">Product Code</label>
                                    <input type="text" name="product_code" class="form-control" id="product_code"
                                           placeholder="Enter Product Code">
                                </div>

                                <div class="form-group">
                                    <label for="product_warehouse">Product Warehouse</label>
                                    <input type="text" name="product_warehouse" class="form-control"
                                           id="product_warehouse"
                                           placeholder="Enter Product Warehouse">
                                </div>
                                <div class="form-group">
                                    <label for="product_route">Product Route</label>
                                    <input type="text" name="product_route" class="form-control" id="product_route"
                                           placeholder="Enter Product Route">
                                </div>
                                <div class="form-group">
                                    <label for="buy_date">Product Buying Date</label>
                                    <input type="date" name="buy_date" class="form-control" id="buy_date">
                                </div>
                                <div class="form-group">
                                    <label for="expire_date">Product Expire Date</label>
                                    <input type="date" name="expire_date" class="form-control" id="expire_date">
                                </div>
                                <div class="form-group">
                                    <label for="buying_price">Product Buying Price</label>
                                    <input type="text" name="buying_price" class="form-control" id="buying_price"
                                           placeholder="Enter Product Buying Price">
                                </div>
                                <div class="form-group">
                                    <label for="selling_price">Product Selling Price</label>
                                    <input type="text" name="selling_price" class="form-control" id="selling_price"
                                           placeholder="Enter Product Selling Price">
                                </div>
                                <div class="form-group">
                                    <label for="product_image">Product Image</label>
                                    <input type="file" name="product_image" accept="image/*" class="form-control"
                                           id="product_image"
                                           onchange="readUrl(this)">
                                    <img id="image" src="#" alt=""/>
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
