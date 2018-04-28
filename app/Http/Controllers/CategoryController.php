<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $data['categories'] = Category::all();
        return view('category.index',$data);
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|min:10'
        ]);
        
        return $request->all();
    }
}
