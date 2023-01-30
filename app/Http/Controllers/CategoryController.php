<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
       $categories= Category::all();
        return view('category.category_index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required']
        ]);

        $category=Category::create([
            'name'=>$request->get('name')
        ]);

        if ($category){
            return to_route('categories.index')->with('success','Category Added Successfully');
        }else{
            return to_route('categories.index')->with('warning','Category Not Added Successfully');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('category.category_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>['required'],
        ]);
        $up_cat= $category->update([
            'name'=>$request->get('name'),
        ]);

        if ($up_cat){
            return to_route('categories.index')->with('success','Category updated successfully');
        }else{
           return Redirect::back()->with('warning',"Category can't be updated");

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return Redirect::back()->with('success','Category Deleted Successfully');
    }
}
