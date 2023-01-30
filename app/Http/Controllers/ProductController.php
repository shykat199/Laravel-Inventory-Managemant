<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Suplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $products=Product::all('id','name','product_image','product_code','product_warehouse','selling_price','product_route');
        return view('product.product_index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $suppliers=Suplier::all('id','name');
        $categories=Category::all();
        return view('product.product_create',compact('suppliers','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $image = $request->file('product_image')->store('public/product');

        $product=Product::create([
            'name'=>$request->get('name'),
            'category_id'=>$request->get('category_id'),
            'suplier_id'=>$request->get('suplier_id'),
            'product_code'=>$request->get('product_code'),
            'product_warehouse'=>$request->get('product_warehouse'),
            'product_route'=>$request->get('product_route'),
            'buy_date'=>$request->get('buy_date'),
            'product_image'=>$image,
            'expire_date'=>$request->get('expire_date'),
            'buying_price'=>$request->get('buying_price'),
            'selling_price'=>$request->get('selling_price'),
        ]);

        if ($product){
            return to_route('products.index')->with('success','Product Added Successfully');
        }else{
            return Redirect::back()->with('warning','Product can not be added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object
     */
    public function show(Product $product)
    {
        $id=$product->id;


        $product=DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('supliers','products.suplier_id','supliers.id')
            ->select('categories.name as cat_name','supliers.name as sup_name','products.*')
            ->where('products.id',$id)
            ->first();

       // return $product;

        return view('product.product_show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $id=$product->id;
        $suppliers=Suplier::all('id','name');
        $categories=Category::all();
        $product=DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('supliers','products.suplier_id','supliers.id')
            ->select('categories.name as cat_name','supliers.name as sup_name','products.*')
            ->where('products.id',$id)
            ->first();

        // return $product;

        return view('product.product_edit',compact('product','suppliers','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $img=$product->product_image;

        if ($request->hasFile('photo')) {
            !isNull($img) && Storage::delete($img);
            $img = $request->file('product_image')->store('public/product');
        }

        $up_product=$product->update([
            'name'=>$request->get('name'),
            'category_id'=>$request->get('category_id'),
            'suplier_id'=>$request->get('suplier_id'),
            'product_code'=>$request->get('product_code'),
            'product_warehouse'=>$request->get('product_warehouse'),
            'product_route'=>$request->get('product_route'),
            'buy_date'=>$request->get('buy_date'),
            'product_image'=>$img,
            'expire_date'=>$request->get('expire_date'),
            'buying_price'=>$request->get('buying_price'),
            'selling_price'=>$request->get('selling_price'),
        ]);

        if ($up_product){
            return to_route('products.index')->with('success','Product Updated Successfully');
        }else{
            return Redirect::back()->with('warning','Product Can not updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
       $img=$product->product_image;

        !is_null($img) && Storage::delete($img);

        $product_dlt=$product->delete();

        if ($product_dlt){
            return to_route('products.index')->with('success','Product Deleted Successfully');
        }else{
            return Redirect::back()->with('warning','Product Can not be deleted');
        }
    }

    public function massInput(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('product.product_massInput');

    }

    public function export(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }
    public function import(Request $request): RedirectResponse
    {
        return Excel::import(new ProductExport, $request->file('upload_file'));
        return to_route('products.index')->with('success','Product Added Successfully');
    }
}
