<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Attribute\AsController;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $salaries= Salary::with('employee')->get();

        return view('salary.salary_index',compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     * @throws \JsonException
     */
    public function create()
    {
        $sal_emp_id=DB::table('salaries')
            ->select('employee_id')
            ->get();

        $data= json_decode(json_encode($sal_emp_id, JSON_THROW_ON_ERROR),
            true, 512, JSON_THROW_ON_ERROR);

        $emplpyees=Employee::select('id','name')
            ->whereNotIn('id',$data)
            ->get();
        //return $employee;

//        $emplpyees=Employee::all();
       return view('salary.salary_create',compact('emplpyees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'employee_id'=>'required',
            'month'=>'required',
            'year'=>'required',
        ]);

        $emp_id=$request->get('employee_id');
        $month=$request->get('month');

        $advance_salary=DB::table('salaries')
            ->where('employee_id',$emp_id)
            ->where('month',$month)
            ->first();

        if ($advance_salary===NULL){
            $salary=Salary::create([
                'employee_id'=>$request->get('employee_id'),
                'month'=>$request->get('month'),
                'advance_salary'=>$request->get('advance_salary'),
                'year'=>$request->get('year'),
            ]);
            if ($salary){
                return to_route('salaries.index')->with('success','Salary Added Successfully');

            }else{
                return  Redirect::back()->with('warning','Salary Not Added Successfully');
            }
        }else{
            return  Redirect::back()->with('warning','Advance salary already given');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param Salary $sal_emp
     * @return Application|Factory|View
     */
    public function show(Salary $salary): Application|Factory|View
    {
//        $sal_emp= Salary::with('employee')->get();
//        //return $sal_emp;
        return view('salary.salary_show',compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Salary $salary
     * @return Application|Factory|View
     */
    public function edit(Salary $salary): View|Factory|Application
    {
        return view('salary.salary_edit',compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Salary $salary
     * @return RedirectResponse
     */
    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'month'=>'required',
            'advance_salary'=>'required',
            'year'=>'required',
        ]);

       $up_sal= $salary->update([
            'month'=>$request->get('month'),
            'advance_salary'=>$request->get('advance_salary'),
            'year'=>$request->get('year'),
        ]);
        if ($up_sal){
            return to_route('salaries.index')->with('success','Salary Updated Successfully');

        }else{
            return  Redirect::back()->with('warning','Salary Not Updated Successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Salary $salary
     * @return RedirectResponse
     */
    public function destroy(Salary $salary): RedirectResponse
    {
        $dlt_sal=$salary->delete();
        if ($dlt_sal){
            return Redirect::back()->with('success','Record deleted successfully');
        }else{
            return Redirect::back()->with('warning','Record not deleted successfully');

        }
    }
}
