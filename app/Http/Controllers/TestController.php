<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use DB;
use App\Category;
use Auth;
use App;


class TestController extends Controller
{
    public function index()
    {
        $data['todos']=Todo::all();
        // return view('test',$data);

        $pdf = \PDF::loadView('test', $data);
        return $pdf->stream();

        

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('/test',$data);
        // return $pdf->stream();

        //eagerloading
        // return Todo::with(array('category'))->get();

        //eloquent
        // $todo=Todo::find(1)->category;
        // return $todo;

        //querybuilder
        // return DB::table('todos')
        // ->select('todos.id','todos.title','todos.description','category.name as nameCategory')
        // ->join('category','todos.category_id','=','category.id')
        // ->get();
    }

    public function test()
    {
        // return Auth::user()->name; //membaca data user yang sudah login

        if(Auth::check())
        {
            return 'sudah login ('.Auth::user()->name.')'.'('.Auth::user()->level.')';
        }
        else
        {
            return 'belum login';
        }
    }

   
}
