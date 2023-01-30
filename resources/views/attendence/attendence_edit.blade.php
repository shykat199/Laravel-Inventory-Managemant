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
                            <x-header.header-component title="Update Attendance"/>
                            <h4 class="text-success" align="center">{{$date->attendance_date}}</h4>
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

                                <form action="{{route('attendance.update')}}" method="post">

                                    @csrf
                                    @foreach($attendances as $attendance)
                                        <tr>
                                            <th scope="row">{{$id++}}</th>
                                            <td>{{$attendance->name}}</td>
                                            <td>{{$attendance->email}}</td>
                                            <td><img
                                                    src="{{\Illuminate\Support\Facades\Storage::url($attendance->photo)}}"
                                                    alt="{{$attendance->name}}" style="height: 60px; width: 60px;"></td>

                                            <input type="hidden" value="{{$attendance->id}}" name="id[]"/>
                                            <input type="hidden" value="{{date('d-m-y')}}" name="attendance_date"/>
                                            <input type="hidden" value="{{date('Y')}}" name="attendance_year"/>
                                            <td>
                                                <input {{$attendance->attendance=== "1" ? 'checked':''}}  class="text-bold" type="radio" name="attendance[{{$attendance->id}}]"
                                                       value="1"/><span class="text-success"><b>Present</b></span>

                                                <input {{$attendance->attendance=== "0" ? 'checked':''}}  class="text-bold " type="radio" name="attendance[{{$attendance->id}}]"
                                                       value="0"/><span class="text-danger" ><b>Absent</b></span>
                                            </td>

                                        </tr>

                                    @endforeach
                                    <button type="submit" class="btn btn-success pull-right">Update Attendance</button>
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
