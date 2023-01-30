@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="panel panel-default">
                        <div style="float: right; padding-top: 10px; padding-right:10px">
                            <a href="{{route('employees.index')}}" type="submit" class="panel-title btn btn-purple waves-effect waves-light"> <i class="fa-solid fa-backward-step"></i> Back
                            </a>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Employee</h3>
                        </div>

                        <div class="panel-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="name">Employee Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                   value="{{$employee->name}}"
                                                   placeholder="Enter Name" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control"
                                                   id="exampleInputEmail1" value="{{$employee->email}}"
                                                   placeholder="Enter email" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" name="phone" class="form-control" id="phone"
                                                   value="{{$employee->phone}}"
                                                   placeholder="Enter Phone Number" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                   value="{{$employee->address}}"
                                                   placeholder="Enter Address" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="experience">Experience</label>
                                            <input type="text" name="experience" class="form-control" id="experience"
                                                   value="{{$employee->experience}}"
                                                   placeholder="Enter Experience" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input type="text" name="salary" class="form-control" id="salary"
                                                   value="{{$employee->salary}}"
                                                   placeholder="Enter Salary" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="vacation">Vacation</label>
                                            <input type="text" name="vacation" class="form-control" id="vacation"
                                                   value="{{$employee->vacation}}"
                                                   placeholder="Enter Vacation" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" name="city" class="form-control" id="city"
                                                   value="{{$employee->city}}"
                                                   placeholder="Enter City" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <label for="photo">Photo</label> <br>
                                        <div class="flex items-center justify-center">
                                            <img id="image" src="{{\Illuminate\Support\Facades\Storage::url($employee->photo)}}"
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
