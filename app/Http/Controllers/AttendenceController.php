<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $employees = Employee::all();
        return view('attendence.attendence_add', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $attendances = DB::table('attendences')
            ->select('edit_date')
            ->groupBy('edit_date')
            ->get();

        //return $attendances;
        return view('attendence.attendence_index', compact('attendances'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'attendance' => ['required']
        ]);

        $to_day = $request->attendance_date;

        $att_date = DB::table('attendences')
            ->where('attendance_date', $to_day)->first();

        if ($att_date) {
            return Redirect::back()->with('warning', "Today's attendance has done");
        } else {

            foreach ($request->employee_id as $id) {
                $date[] = [
                    'employee_id' => $id,
                    'attendance' => $request->attendance[$id],
                    'attendance_date' => $request->attendance_date,
                    'attendance_year' => $request->attendance_year,
                    'edit_date' => date('d_m_y'),
                ];
            }

            $attendance = DB::table('attendences')->insert($date);

            if ($attendance) {
                return to_route('attendance.index')->with('success', 'Attendance Added Successfully');
            } else {
                return Redirect::back()->with('warning', "Attendance Doesn't added Successfully");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Attendence $attendence
     * @return Response
     */
    public function show(Attendence $attendence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $edit_date
     * @return Application|Factory|View
     */
    public function edit($edit_date): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $date = DB::table('attendences')
            ->where('edit_date', $edit_date)->first();

        $attendances = DB::table('attendences')
            ->join('employees', 'attendences.employee_id', 'employees.id')
            ->select('employees.id', 'employees.name', 'employees.photo', 'employees.email', 'attendences.*')
            ->where('edit_date', $edit_date)
            ->get();

        //return $attendances;
        return view('attendence.attendence_edit', compact('attendances', 'date'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Attendence $attendence
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {

        foreach ($request->id as $id) {
            $date = [
                'attendance' => $request->attendance[$id],
                'attendance_date' => $request->attendance_date,
                'attendance_year' => $request->attendance_year,
            ];
            $attendance = Attendence::where([
                'attendance_date' => $request->attendance_date,
                'id' => $id
            ])->first();

            $attendance->update($date);
        }
        // return $attendance;

        if ($attendance) {
            return to_route('attendance.index')->with('success', 'Attendance Added Successfully');
        } else {
            return Redirect::back()->with('warning', "Attendance Doesn't added Successfully");
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Attendence $attendence
     * @return Response
     */
    public function destroy(Attendence $attendence)
    {
        //
    }
}
