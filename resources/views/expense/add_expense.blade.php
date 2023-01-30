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
                            <h3 class="panel-title text-white">Add Expenses</h3>
                        </div>

                        <div class="panel-body">
                            <form role="form" action="{{route('expenses.store')}}" method="POST">
                                @csrf
                                @method('Post')

                                <div class="form-group">
                                    <label for="year">Expense Amount</label>
                                    <input type="text" name="amount" class="form-control" id="year"
                                           placeholder="Enter Amount">
                                </div>

                                <div class="form-group">
                                    <label for="details">Expense Details</label>

                                        <textarea name="details" rows="4" class="form-control">
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
                                <div class="form-group">
                                    <input type="hidden" name="year" class="form-control" id="year"
                                           value="{{date('Y')}}">
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
