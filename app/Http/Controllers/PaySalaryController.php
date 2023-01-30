<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PaySalary;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaySalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $employees= Employee::all('id','name','photo','salary');
        $emp_advance=Salary::all('employee_id','advance_salary','month');
        return view('paysalary.paySalary_index',compact('employees','emp_advance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaySalary  $paySalary
     * @return \Illuminate\Http\Response
     */
    public function show(PaySalary $paySalary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaySalary  $paySalary
     * @return \Illuminate\Http\Response
     */
    public function edit(PaySalary $paySalary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaySalary  $paySalary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaySalary $paySalary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaySalary  $paySalary
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaySalary $paySalary)
    {
        //
    }
}
