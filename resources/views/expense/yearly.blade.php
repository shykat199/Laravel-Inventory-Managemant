@extends('layouts.app')
@section('content')

    <div class="content-page">

        <div class="content">

            <div class="row">
                <div class="col-md-1">
                </div>

                <div class="col-md-11">

                    <div class="col-md-11">
                        <div class="panel panel-default">
                            <div style="float: right; padding-top: 10px; padding-right:10px">
                                <a href="{{route('expenses.create')}}" type="submit" class="panel-title btn btn-purple waves-effect waves-light">Add Expenses  &nbsp; <i class="fa-solid fa-user-plus"></i>
                                </a>
                            </div>
                            @php

                                $year=date('Y');
                                $yearly_expenses=\Illuminate\Support\Facades\DB::table('expenses')
                                ->where('month',$year)
                                ->get();

                            @endphp

                            <div class="row">

                                <x-header.header-component title="Monthly Expenses"/>

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
                                    @foreach($yearly_expenses as $expense)
                                        <x-expenses-table.table-item-component :expense="$expense" :id="$id++"/>
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
