@extends('layouts.app')
@section('content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
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
                        <div class="col-md-11">
                            <div class="panel panel-default">
                                <div style="float: right; padding-top: 10px; padding-right:10px">
                                    <a href="{{route('expenses.create')}}" type="submit"
                                       class="panel-title btn btn-purple waves-effect waves-light">Add Expenses &nbsp;
                                        <i class="fa-solid fa-user-plus"></i>
                                    </a>
                                </div>
                                @php

                                    $to_date=date('d-m-y');
                                    $today_expenses=\Illuminate\Support\Facades\DB::table('expenses')
                                    ->where('date',$to_date)
                                    ->sum('amount');

                                    $month=date('F');
                                    $month_expenses=\Illuminate\Support\Facades\DB::table('expenses')
                                    ->where('month',$month)
                                    ->sum('amount');

                                    $year=date('Y');
                                    $year_expenses=\Illuminate\Support\Facades\DB::table('expenses')
                                    ->where('month',$year)
                                    ->sum('amount');

                                @endphp

                                <div class="row">

                                    <x-header.header-component title="All Expenses"/>


                                    <div class=" row panel-heading">
                                        <div class="col-sm-5 text-danger font-weight-bold"><p
                                                class="font-weight-bold panel-title">Today's
                                                Expenses:- {{$today_expenses}} Taka</p></div>
                                        <div class="col-sm-5 text-primary font-weight-bold"><p
                                                class="font-weight-bold panel-title">Month's
                                                Expenses:- {{$month_expenses}} Taka</p></div>
                                        <div class="col-sm-5 text-info font-weight-bold"><p
                                                class="font-weight-bold panel-title">Year's
                                                Expenses:- {{$year_expenses}} Taka</p></div>
                                    </div>

                                </div>

                                <div class="panel-body">
                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#Id</th>
                                            <th scope="col">Month</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $id=1;
                                        @endphp
                                        @foreach($expenses as $expense)
                                            <x-expenses-table.table-item-component :expense="$expense" :id="$id++"/>
                                        @endforeach


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- panel-body -->
                </div> <!-- panel -->
            </div>
        </div>

@endsection
