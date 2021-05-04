<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class FrontendController extends Controller
{
    function Category(){
        $categories=Category::all();

        return view("front.home",compact("categories"));
    }

}
