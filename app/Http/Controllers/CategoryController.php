<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Category\CreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $categories = Category::all();
        return view( 'admin.category.index', compact( 'categories' )  );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view( 'admin.category.create', compact( 'categories' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( CreateRequest $request)
    {
        $request[ 'slug' ] = Str::slug( $request->name );
        Category::create( $request->all() );
        toast('Category Created Successfully!!','success');
        return redirect()->route( 'category.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view( 'admin.category.edit', compact( 'category', 'categories' )  );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update( CreateRequest $request, Category $category)
    {
        $request[ 'slug' ] = Str::slug( $request->name );
        toast('Category Updated Successfully!!','success');
        $category->update( $request->all() );
        return redirect()->route( 'category.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        toast('Category Deleted Successfully!!','success');
        return redirect()->back();
    }
}
