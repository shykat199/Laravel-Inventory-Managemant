<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

class CustomerController extends Controller
{
    public function index(){
        $customers=Customer::all();
        return view('customer.customer_index',compact('customers'));
    }

    public function create(){

        return view('customer.customer_create');
    }

    public function store(CustomerRequest $request){

        $image = $request->file('photo')->store('public/customer');

         $customer=Customer::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'photo'=>$image,
            'shopName'=>$request->get('shopName'),
            'bankAccount'=>$request->get('bankAccount'),
        ]);

        if ($customer) {
            $notification = array([
                'message' => "Customer Updated Successfully",
                'alert-type' => "success"
            ]);
            return Redirect::back()->with('customer.index', compact('notification'));
        } else {
            $notification = array([
                'message' => "Customer Updated Successfully",
                'alert-type' => "error"
            ]);
            return Redirect::back()->with($notification);
        }

    }


    public function view($id){
        $customer=DB::table('customers')->where('id',$id)->first();
        return view('customer.customer_show',compact('customer'));
    }

    public function edit($id){
        $customer=DB::table('customers')->where('id',$id)->first();
        return view('customer.customer_edit',compact('customer'));
    }

    public function update(CustomerRequest $request,$id){

        $cutomer=DB::table('customers')
            ->where('id',$id)
            ->first();
        $img=$cutomer->photo;

        if ($request->hasFile('photo')) {
            !isNull($img) && Storage::delete($img);
            $img = $request->file('photo')->store('public/customer');
        }
        $up_customer = DB::table('customers')
            ->where('id', $id)->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'photo'=>$img,
                'shopName'=>$request->get('shopName'),
                'bankAccount'=>$request->get('bankAccount'),
            ]);

        if ($up_customer) {
            $notification = array([
                'message' => "Customer Updated Successfully",
                'alert-type' => "success"
            ]);
            return to_route('customer.index', compact('notification'));
        } else {
            $notification = array([
                'message' => "Customer Updated Unsuccessfully",
                'alert-type' => "error"
            ]);
            return to_route('customer.index', compact('notification'));
        }

    }


    public function delete($id){
        $emp=DB::table('customers')
            ->where('id',$id)
            ->first();

        $img=$emp->photo;

        !is_null($img) && Storage::delete($img);

        $customer_dlt=DB::table('customers')
            ->where('id',$id)
            ->delete();

        if ($customer_dlt){

            $notification = array([
                'message' => "Customer Deleted Successfully",
                'alert-type' => "success"
            ]);
            return to_route('customer.index', compact('notification'));
        } else {
            $notification = array([
                'message' => "Customer Not Deleted Successfully",
                'alert-type' => "error"
            ]);
            return Redirect::back()->with($notification);
        }


    }
}
