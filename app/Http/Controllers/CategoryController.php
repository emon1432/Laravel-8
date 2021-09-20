<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    //
     public function AllCat(){
         $categories = Category::all();
         return view('admin.category.index',compact('categories'));
     }

     public function AddCat(Request $request){

        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],

        //custom msg for validation
        [
            'category_name.required' => 'Please Enter a Category Name',
            'category_name.unique' => 'Category Name Already Exist',
        ]);

        // Category::insert([
        //     'category_name'=> $request->category_name,
        //     'user_id'=> Auth::user()->id,
        //     'created_at'=> Carbon::now()
        // ]);


                //or

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

                //or

        //Query Builder

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->insert($data);





        // return redirect('/category/all');
        return Redirect()->back()->with('success','Category inserted successfully');

     }
}
