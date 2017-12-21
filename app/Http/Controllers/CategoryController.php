<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $all_categories = DB::table('categories')->get();
        return view('categories.index', compact('all_categories'));
    }

    
    public function create()
    {
        $all_categories = DB::table('categories')->where('parent_id', 0)->get();
        return view('categories.create', compact('all_categories'));
    }

    
    public function store(Request $request)
    {
        //return $request->all();
        $category = new Category;
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->description = $request->description;

        $category->save();

        return redirect('/categories');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $selected = '';
        $all_categories = DB::table('categories')->where('parent_id', 0)->get();
        $category = DB::table('categories')->where('id', $id)->get()->first();
        return view("categories.edit", compact(['all_categories', 'category', 'selected']));
    }

    
    public function update(Request $request, $id)
    {
        
        $category = array();
        $category['name'] = $request->name;
        $category['parent_id'] = $request->parent_id;
        $category['description'] = $request->description;

       
        DB::table('categories')
            ->where('id', $id)
            ->update($category);

        return redirect('/categories');
    }

    
    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect('/categories');
    }
}
