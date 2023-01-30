<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;


class POSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products=DB::table('products')
        ->join('categories','products.category_id','categories.id')
            ->select('categories.id','categories.name as cat_name','products.*')
            ->get();
        $customers=Customer::all();
        $categories=Category::all();

        return  view('pos.index',compact('products','customers','categories'));
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $rowId
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($rowId, Request  $request)
    {

       $update= Cart::update($rowId,$request->qty);

        if ($update){
            return Redirect::back()->with('success','Product Updated Successfully');
        }else{
            return Redirect::back()->with('warning','Product Not Updated');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($rowId)
    {
       $rmvItem= Cart::remove($rowId);

        if ($rmvItem){
            return Redirect::back()->with('success','Product Remove Successfully');
        }else{
            return Redirect::back()->with('warning','Product Not removed');

        }
    }
    public function addToCart(Request $request){

        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['weight']=0.0;
        $data['price']=$request->price;

//        echo "<pre>";
//        print_r($data);

        $addCart= Cart::add($data);

        if ($addCart){
            return Redirect::back()->with('success','Product Added Successfully');
        }else{
            return Redirect::back()->with('warning','Product Not Added');

        }
    }

    public function createInvoice(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $request->validate([
            'customer_id'=>'required',
        ],
            [
               'customer.required'=>"Select Customer First",
            ]
        );

        $customer_id=$request->customer_id;

        $customer=DB::table('customers')
            ->where('id',$customer_id)->first();

        $cartItems=Cart::content();

        return view('pos.invoice',compact('customer','cartItems'));
    }

    public  function createFinalInvoice(Request $request){

        $request->validate([
            'payment_status'=>'required',
        ],[
            'payment_status.required'=>'Select The payment method first',
        ]);

        $data=array();
        $data['customer_id']=$request->get('customer_id');
        $data['order_date']=$request->get('order_date');
        $data['order_status']=$request->get('order_status');
        $data['total_products']=$request->get('total_products');
        $data['sub_total']=$request->get('sub_total');
        $data['vat']=$request->get('vat');
        $data['total']=$request->get('total');
        $data['payment_status']=$request->get('payment_status');
        $data['pay']=$request->get('pay');
        $data['due']=$request->get('due');

//        echo "<pre>";
//         print_r($data);
//         exit();

        $order_id=DB::table('orders')->insertGetId($data);

        $contents=Cart::content();
        $add=false;
        $orderDetails=array();

        foreach ($contents as $content){
            $orderDetails['order_id']=$order_id;
            $orderDetails['product_id']=$content->id;
            $orderDetails['quantity']=$content->qty;
            $orderDetails['unitcost']=$content->price;
            $orderDetails['total']=$content->total;

            $add=DB::table('order_details')->insert($orderDetails);
        }

        if ($add){
            Cart::destroy();
            return to_route('pos.index')->with('success','order Added Successfully | Accept the order');
        }else{
            return Redirect::back()->with('warning','Product Not Added');

        }

    }

}
