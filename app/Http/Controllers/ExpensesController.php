<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $expenses=Expenses::all();

        return view('expense.all_expense',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('expense.add_expense');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'details'=>['required'],
            'amount'=>['required'],
        ]);

        $expenses=Expenses::create([
            'details'=>$request->get('details'),
            'amount'=>$request->get('amount'),
            'date'=>$request->get('date'),
            'month'=>$request->get('month'),
            'year'=>$request->get('year'),
        ]);

        if ($expenses){
            return to_route('expenses.index')->with('success','Expenses added successfully');
        }else{
            return Redirect::back()->with('warning','Expenses Not added ');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $expenses=DB::table('expenses')
            ->where('id',$id)
            ->first();
        return view('expense.edit_expenses',compact('expenses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            'details'=>['required'],
            'amount'=>['required'],
        ]);
        $expenses=DB::table('expenses')
            ->where('id',$id)
            ->update([
                'details'=>$request->get('details'),
                'amount'=>$request->get('amount'),
                'date'=>$request->get('date'),
                'month'=>$request->get('month'),
                'year'=>$request->get('year'),
            ]);
        if ($expenses){
            return to_route('expenses.index')->with('success','Expenses added successfully');
        }else{
            return Redirect::back()->with('warning','Expenses Not added ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
       $exp_dlt= DB::table('expenses')
           ->where('id',$id)
           ->delete();

        if ($exp_dlt){
            return to_route('expenses.index')->with('success','Expenses Deleted successfully');
        }else{
            return Redirect::back()->with('warning','Expenses Not Deleted ');
        }
    }

    public function monthly(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $month=date('F');
        $month_expenses=\Illuminate\Support\Facades\DB::table('expenses')
            ->where('month',$month)
            ->get();
        if ($request->has('month')){
            $month_expenses=Expenses::where('month','like',"%{$request->get('month')}%")->get();
        }
        return view('expense.monthly',compact('month_expenses'));
    }
    public function yearly(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('expense.yearly');
    }

}
