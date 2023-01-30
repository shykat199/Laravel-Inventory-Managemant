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
                                <h3 class="panel-title">Expenses</h3>
                            </div>

                            <div class="panel-body">
                                <div class="container">
                                    <form action="{{route('expenses.update',$expenses->id)}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="row">

                                            <div class="form-group">
                                                <label for="amount">Expense Amount</label>
                                                <input type="text" name="amount" class="form-control" id="amount"
                                                       value="{{$expenses->amount}}"
                                                       placeholder="Enter Amount">
                                            </div>

                                            <div class="form-group">
                                                <label for="details">Expense Details</label>

                                                <textarea name="details" rows="4" class="form-control">
                                                    {{trim($expenses->details)}}
                                                </textarea>

                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" name="month" class="form-control" id="year"
                                                       value="{{date('F')}}">
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" name="date" class="form-control" id="year"
                                                       value="{{date('d-m-y')}}">
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
