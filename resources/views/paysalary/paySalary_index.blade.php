@extends('layouts.app')
@section('content')

    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-md-1">
                </div>
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
                            <a href="{{route('salaries.create')}}" type="submit"
                               class="panel-title btn btn-purple waves-effect waves-light">Pay Salary &nbsp<i
                                    class="fa-solid fa-user-plus"></i>
                            </a>
                        </div>
                        <div class="panel-heading">

                            <<x-header.header-component title="All Salary"/>
                            <h5 class="text-danger text-bold">{{date('F Y')}}</h5>
                        </div>


                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actual Salary</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Advance Salary</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $id=1;
                                @endphp
                                @foreach($employees as $employee)
                                    <tr>
                                        <th scope="row">{{$id++}}</th>
                                        <td>{{$employee->name}}</td>
                                        <td>
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($employee->photo)}}" style="height: 100px; width: 100px" alt="">
                                        </td>
                                        <td>
                                            {{$employee->salary}}
                                        </td>
                                        <td>
                                            <span>{{date('F',strtotime('-1 months'))}}</span>
                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a href=""
                                                       class="btn btn-primary">Pay Now</a>
                                                </div>
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
