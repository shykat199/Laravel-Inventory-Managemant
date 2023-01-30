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
                            <span class="font-medium">Warning Alert! &nbsp; {{\Illuminate\Support\Facades\Session::get('warning')}}</span>
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
                            <form role="form" action="{{route('salaries.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                @php
                                    $months=array('January','February','March','April','May','June','July','August','September','October','December');
                                @endphp

                                <div class="form-group">
                                    <label for="type">Month</label>
                                    <select name="month" id="" class="form-control">
                                        <option selected>Select A Option</option>
                                        @foreach($months as $month)
                                            <option value="{{$month}}">{{$month}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="type"> Employee Name</label>
                                    <select name="employee_id" id="" class="form-control">
                                        <option selected>Select A Option</option>
                                        @foreach($emplpyees as $emplpyee)
                                            <option value="{{$emplpyee->id}}">{{$emplpyee->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="account">Advance Salary</label>
                                    <input type="text" name="advance_salary" class="form-control" id="account"
                                           placeholder="Enter Advance Salary">
                                </div>

                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="text" name="year" class="form-control" id="year"
                                           placeholder="Enter Year">
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
