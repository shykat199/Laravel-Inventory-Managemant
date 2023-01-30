<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pendingOrders=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','customers.id','orders.*')
            ->where('orders.order_status','pending')
            ->get();
        //return  $pendingOrders;
        return view('order.pending_orders',compact('pendingOrders'));
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

    public function show($id)
    {

        $orderDetails=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','customers.id as cust_id','orders.*')
            ->where('orders.id',$id)
            ->first();


        $odetails=DB::table('order_details')
            ->join('products','order_details.product_id','products.id')
            ->select('order_details.*','products.name','products.product_code')
            ->where('order_id',$id)
            ->get();
        //return $orderDetails;
        //return $odetails;
        return view('order.view_orders',compact('orderDetails','odetails'));
//        echo "<pre>";
//        print_r($orderDetails);
//        echo "<br>";
//        print_r($odetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $updateOrder=DB::table('orders')
            ->where('id',$id)
            ->update(['order_status'=>'approve']);

        if ($updateOrder){
            return to_route('approve.order')->with('success','Order Has Been Approved');
        }else{
            return to_route('orders.index')->with('warning','Order Not  Approved');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Order $order)
    {
        $dlt_order=$order->delete();

        if ($dlt_order){
            return Redirect::back()->with('success','Order Has Been Deleted');
        }else{
            return Redirect::back()->with('warning','Order Not  Deleted');

        }
    }

    public function approveOrder(): Factory|View|Application
    {

        $pendingOrders=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','customers.id','orders.*')
            ->where('orders.order_status','approve')
            ->get();
        //return $pendingOrders;
        return view('order.approve_order',compact('pendingOrders'));

    }

}
