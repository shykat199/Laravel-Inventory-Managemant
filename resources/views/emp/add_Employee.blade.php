@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div style="float: right; padding-top: 10px; padding-right:10px">
                            <button type="submit" class="panel-title btn btn-purple waves-effect waves-light">Submit
                            </button>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Employee</h3>
                        </div>

                        <div class="panel-body">
                            <form role="form" action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="name">Employee Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                           placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                           placeholder="Enter Phone Number">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address"
                                           placeholder="Enter Address">
                                </div>
                                <div class="form-group">
                                    <label for="experience">Experience</label>
                                    <input type="text" name="experience" class="form-control" id="experience"
                                           placeholder="Enter Experience">
                                </div>

                                <div class="form-group">
                                    <label for="salary">Salary</label>
                                    <input type="text" name="salary" class="form-control" id="salary"
                                           placeholder="Enter Salary">
                                </div>
                                <div class="form-group">
                                    <label for="vacation">Vacation</label>
                                    <input type="text" name="vacation" class="form-control" id="vacation"
                                           placeholder="Enter Vacation">
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="form-control" id="city"
                                           placeholder="Enter City">
                                </div>

                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" class="upload form-control" id="photo"
                                           placeholder="Enter Photo" accept="image/*" onchange="readUrl(this)">
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
