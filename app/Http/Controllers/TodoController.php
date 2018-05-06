<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Category;
use Datatables;
use Collective\Html\FormFacade as Form;


class TodoController extends Controller
{

    public function __construct()
    {
        //$this->middleware('checkLogin',['except'=>['pdf','excel']]);
    }

    public function pdf()
    {
        return 'pdf';
    }

    
    public function excel()
    {
        return 'excel';
    }

    public function json()
    {
        $todo=Todo::all();
        return Datatables::of($todo)
        ->addColumn('images',function($todo)
        {
            return "<img src='images/".$todo->image."' width='100'>";
        })
        ->addcolumn('action',function($todo) {
            $data=link_to('todo/'.$todo->id.'/edit','Edit',['class'=>'btn btn-danger btn-sm']);
            $data.=Form::open(['url'=>'todo/'.$todo->id,'method'=>'delete']);
            $data.=Form::submit('Delete',['class'=>'btn btn-danger btn-sm']);
            $data.=Form::close();
            return $data;
        })
        ->rawColumns(['images','action'])
        ->make(true);
    }

    public function index(){
        //return Todo::all();
        
         $data['todos'] = Todo::simplePaginate(2);
        return view('todo.index',$data);
    }

    public function create(){
        $data['categories']=Category::pluck('name','id');
        return view('todo.create');
        
    }

    public function edit($id){
        $data['todo']=Todo::find($id);
        $data['categories']=Category::pluck('name','id');
        return view('todo.edit',$data);
    }

    public function update($id, Request $request){
        $this->rules($request);
        $todo=Todo::find($id);

        $fileName=$this->do_upload($request);
        if(!empty($fileName)){
            $todo->image=$fileName;
        }


        // $todo->update($request->all());
        // if($todo->isDirty()) //[optional]cek  bila tidak ada data berubah, maka tidak di update
        // $todo -> save();

        $todo->title=$request->title;
        $todo->description = $request->description;
        $todo->update();
        ///return redirect('/todo');;
        return redirect('/todo')->with('message','Data Todo '.$todo->title.' Telah Diupdate');
    }

    public function destroy($id)
    {
        $todo=Todo::find($id);
        $todo->delete();
        return redirect('/todo')->with('message','Data Todo'.$todo->title.'Telah Dihapus');
    }

    public function store(Request $request){
        
        $this->rules($request);

        $file=$request->file('images');
        $namaFile=$file->getClientOriginalName();
        $folder="images";
        $file->move($folder,$namaFile);

        $todo=new Todo();
        $todo->title        = $request->title;
        $todo->description  = $request -> description;
        $todo->image        = $namaFile;
        //$todo->category_id  = $request->category_id;
        $todo -> save();
        
        // return $request->all();
        // $todo->create($request->all()); --> nggak bisa dipake karena sudah ada nama file nya
        return redirect('/todo')->with('message','Data Todo '.$todo->title.' Telah Dibuat');
        //return redirect('/todo');

        
    }

    public function rules($request)
    {
        $request->validate([
            'title' => 'required|min:10',
            'description' => 'required|max:25',
        ]);

    }

    public function do_upload($request)
    {
        $file=$request->file('images');

        if($file)
        {
            $namaFile=$file->getClientOriginalName();
            $folder="images";

            $file->move($folder,$namaFile);
            return $namaFile;
        }
    }
}
