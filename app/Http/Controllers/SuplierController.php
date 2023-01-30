<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

class SuplierController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $suppliers=Suplier::all();
        return view('supplier.supplier_index',compact('suppliers'));
    }
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view('supplier.supplier_create');
    }

    public function store(SupplierRequest $request): \Illuminate\Http\RedirectResponse
    {
        $image = $request->file('photo')->store('public/supplier');

        $supplier=Suplier::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'photo'=>$image,
            'shop'=>$request->get('shop'),
            'account'=>$request->get('account'),
            'city'=>$request->get('city'),
            'type'=>$request->get('type'),
        ]);

        if ($supplier) {
            $notification = array([
                'message' => "Employee Updated Successfully",
                'alert-type' => "success"
            ]);
            return to_route('supplier.index', compact('notification'));
        } else {
            $notification = array([
                'message' => "Employee Updated Successfully",
                'alert-type' => "error"
            ]);
            return to_route('supplier.index', compact('notification'));
        }
    }

    public function view($id){

        $supplier=DB::table('supliers')
            ->where('id',$id)
            ->first();
        return view('supplier.supplier_show',compact('supplier'));

    }


    public function edit($id){
        $supplier=DB::table('supliers')
            ->where('id',$id)
            ->first();
        return view('supplier.supplier_edit',compact('supplier'));
    }


    public function update(Request $request,$id): \Illuminate\Http\RedirectResponse
    {

//        $request->validate([
//            'name' => ['required'],
//            'email' => 'required|email',
//            'phone' => ['required'],
//            'address' => ['required'],
//            'shop' => ['required'],
//            'account' => ['required'],
//            'vacation' => ['required'],
//            'city' => ['required'],
//        ]);


        $suplier=DB::table('supliers')
            ->where('id',$id)
            ->first();
        $img=$suplier->photo;

        if ($request->hasFile('photo')) {
            !isNull($img) && Storage::delete($img);
            $emp_img = $request->file('photo')->store('public/supplier');
        }

        $up_sup=DB::table('supliers')
            ->where('id',$id)
            ->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'photo'=>$img,
                'shop'=>$request->get('shop'),
                'account'=>$request->get('account'),
                'city'=>$request->get('city'),
                'type'=>$request->get('type'),
            ]);
        if ($up_sup) {
            $notification = array([
                'message' => "Supplier Updated Successfully",
                'alert-type' => "success"
            ]);
            return to_route('supplier.index', compact('notification'));
        } else {
            $notification = array([
                'message' => "Employee Not updated",
                'alert-type' => "error"
            ]);
            return to_route('supplier.index', compact('notification'));
        }


    }


    public function delete($id){
        $supplier=DB::table('supliers')
            ->where('id',$id)
            ->first();
        $img=$supplier->photo;
        isNull($img) && Storage::delete($img);

        $dlt_supplier=DB::table('supliers')
            ->where('id',$id)
            ->delete();

        if ($dlt_supplier) {
            $notification = array([
                'message' => "Supplier deleted Successfully",
                'alert-type' => "success"
            ]);
            return to_route('supplier.index', compact('notification'));
        } else {
            $notification = array([
                'message' => "Supplier deletion Unsuccessfully",
                'alert-type' => "error"
            ]);
            return Redirect::back()->with($notification);
        }

    }




}
