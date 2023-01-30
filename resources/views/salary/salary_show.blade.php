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
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Salary</h3>
                        </div>

                        <div class="panel-body">
                            <form role="form" action="{{route('salaries.update',$salary->id)}}" method="POST"
                                  enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="type"> Month</label>
                                    <input type="text" name="advance_salary" class="form-control" id="account"
                                           value="{{$salary->month}}"
                                           placeholder="Enter Advance Salary" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="type"> Employee Name</label>
                                    <input type="text" name="advance_salary" class="form-control" id="account"
                                           value="{{$salary->employee->name}}"
                                           placeholder="Enter Advance Salary" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="account">Advance Salary</label>
                                    <input type="text" name="advance_salary" class="form-control" id="account"
                                           value="{{$salary->advance_salary}}"
                                           placeholder="Enter Advance Salary" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="text" name="year" class="form-control" id="year"
                                           value="{{$salary->year}}"
                                           placeholder="Enter Year" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="year">Image</label><br>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($salary->employee->photo)}}" style="width: 100px; height: 100px" alt="">
                                </div>
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
