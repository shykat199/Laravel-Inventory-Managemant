<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        return view('setting.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $image = $request->file('sight_logo')->store('public/logo');

        $validatedData = Setting::create([
            'sight_title' => $request->get('sight_title'),
            'sight_sub_title' => $request->get('sight_sub_title'),
            'company_address' => $request->get('company_address'),
            'sight_logo' => $image,
        ]);

        if ($validatedData) {
            return Redirect::back()->with('success', 'Added');
        } else {
            return Redirect::back();
        }

    }

    public function show(): Application|Factory|View
    {
        $settings = DB::table('settings')
            ->where('id', 1)
            ->first();
        //return $settings;
        return view('setting.update', compact('settings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Setting $setting
     * @return Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Setting $setting
     * @return array
     */
    public function update(Request $request, $id)
    {

        //return $request->sight_logo;

        $settings = DB::table('settings')
            ->where('id', $id)
            ->first();
        $image=$settings->sight_logo;

        if ($request->hasFile('sight_logo')) {
            !isNull($image) && Storage::delete($image);
            $image = $request->file('sight_logo')->store('public/logo');
        }

        $update = DB::table('settings')
            ->where('id', $id)
            ->update([
                'sight_title' => $request->get('sight_title'),
                'sight_sub_title' => $request->get('sight_sub_title'),
                'company_address' => $request->get('company_address'),
                'sight_logo' => $image,
            ]);

        if ($update) {
            return Redirect::back()->with('success', 'Updated');
        } else {
            return Redirect::back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setting $setting
     * @return Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
