<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
     function AllCat(){
         return view('admin.category.index');
     }
}
