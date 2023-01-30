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
                        </div>


                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $id=1;
                                @endphp


                                    @foreach($attendances as $attendance)
                                        <tr>
                                            <th scope="row">{{$id++}}</th>
                                            <td>{{$attendance->edit_date}}</td>
                                            <td>
                                                <div class="col-6 col-md-4">
                                                    <a href="{{route('attendance.edit',$attendance->edit_date)}}"
                                                       class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach

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
