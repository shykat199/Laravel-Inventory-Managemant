<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $employees = Employee::all();
        return view('emp.all_Employee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('emp.add_Employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        $image = $request->file('photo')->store('public/employee');

        $employee = Employee::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'experience' => $request->get('experience'),
            'photo' => $image,
            'salary' => $request->get('salary'),
            'vacation' => $request->get('vacation'),
            'city' => $request->get('city'),
        ]);

        if ($employee) {
            $notification = array(
                'message' => 'Data Uploaded Successfully',
                'alert-type' => 'success'
            );
            return Redirect::back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Data Uploaded Unsuccessfully',
                'alert-type' => 'error'
            );
            return Redirect::back()->with($notification);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return Application|Factory|View
     */
    public function show(Employee $employee): View|Factory|Application
    {
        return view('emp.show_Employee', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $employee=DB::table('employees')
            ->where('id',$id)
            ->first();
        return view('emp.edit_Employee', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'name' => ['required'],
            'email' => 'required|email|unique:employees',
            'phone' => ['required'],
            'address' => ['required'],
            'experience' => ['required'],
            'salary' => ['required'],
            'vacation' => ['required'],
            'city' => ['required'],
        ]);
        $emp = DB::table('employees')
            ->where('id', $id)
            ->first();
        $emp_img = $emp->photo;

        if ($request->hasFile('photo')) {
            !isNull($emp_img) && Storage::delete($emp_img);
            $emp_img = $request->file('photo')->store('public/employee');
        }
        $up_emp = DB::table('employees')
            ->where('id', $id)->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'experience' => $request->get('experience'),
                'photo' => $emp_img,
                'salary' => $request->get('salary'),
                'vacation' => $request->get('vacation'),
                'city' => $request->get('city'),
            ]);

        if ($up_emp) {
            $notification = array([
                'message' => "Employee Updated Successfully",
                'alert-type' => "success"
            ]);
            return to_route('employees.index', compact('notification'));
        } else {
            $notification = array([
                'message' => "Employee Updated Successfully",
                'alert-type' => "success"
            ]);
            return to_route('employees.index', compact('notification'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {

        $emp = DB::table('employees')
            ->where('id', $id)
            ->first();
        $photo = $emp->photo;

        !is_null($photo) && Storage::delete($photo);

        $dltEmp = DB::table('employees')
            ->where('id', $id)
            ->delete();

        if ($dltEmp) {
            $notification = array([
                'message' => "Employee Updated Successfully",
                'alert-type' => "success"
            ]);
            return to_route('employees.index', compact('notification'));
        } else {
            $notification = array([
                'message' => "Employee deletion Unsuccessfully",
                'alert-type' => "error"
            ]);
            return Redirect::back()->with($notification);
        }
    }
}
