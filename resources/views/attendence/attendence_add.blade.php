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
                    <div class="panel panel-default">
                        <div style="float: right; padding-top: 10px; padding-right:10px">
                            <a href="{{route('employees.create')}}" type="submit"
                               class="panel-title btn btn-purple waves-effect waves-light">Show All Attendance &nbsp; <i
                                    class="fa-solid fa-user-plus"></i>
                            </a>
                        </div>
                        <div class="panel-heading">
                            <x-header.header-component title="Add Attendance"/>

                            <h4 class="text-success" align="center">{{date('d-m-y')}}</h4>

                        </div>


                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $id=1;
                                @endphp

                                <form action="{{route('attendance.store')}}" method="post">
                                    @method('POST')
                                    @csrf
                                    @foreach($employees as $employee)
                                        <x-attendence.attendence-table :employee="$employee" :id="$id++"></x-attendence.attendence-table>


                                    @endforeach
                                    <button type="submit" class="btn btn-success pull-right">Submit Attendance</button>
                                </form>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <!-- panel-body -->
            </div> <!-- panel -->
        </div>
    </div>

@endsection
