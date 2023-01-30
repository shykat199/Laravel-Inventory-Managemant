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
                               class="panel-title btn btn-purple waves-effect waves-light">Add Advance Salary &nbsp; <i
                                    class="fa-solid fa-user-plus"></i>
                            </a>
                        </div>
                        <div class="panel-heading">
                            <x-header.header-component title="All Salaries"/>
                        </div>

                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Advance Salary</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $id=1;
                                @endphp
                                @foreach($salaries as $salary)
                                    <tr>
                                        <th scope="row">{{$id++}}</th>
                                        <td>{{$salary->employee->name}}</td>
                                        <td>{{$salary->advance_salary}}</td>
                                        <td>{{$salary->month}}</td>
                                        <td>{{$salary->year}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{route('salaries.show',$salary->id)}}"
                                                       class="btn btn-warning"><i class="fa-sharp fa-solid fa-eye"></i></a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{route('salaries.edit',$salary->id)}}"
                                                       class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                </div>
                                                <div class="col">
                                                    <form
                                                        method="POST"
                                                        action="{{route('salaries.destroy',$salary->id)}}"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </div>


                                            </div>
                                        </td>
                                        <td></td>
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
