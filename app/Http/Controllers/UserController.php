<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*         $data['users'] = array(
                array('name'=>'nuris','email'=>'nuris.akbar@gmail.com','password'=>'password'),
                array('name'=>'zaki','email'=>'zaki.akbar@gmail.com','password'=>'password')
        ); */

        $data['users']=DB::table('users')->get();
        return view('user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->name;
        $input=$request->except(['_token']);
        //DB::table('users')->insert($input);
        DB::table('users')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
            ]);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['user']=DB::table('users')->where('id',$id)->first();
        return view('user.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $password=$request->password;
        if(!empty($password)) //jika password berubah, maka update password
        {
            DB::table('users')->where('id',$id)->update
            ([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
                ]);
        }
        else
        {
            DB::table('users')->where('id',$id)->update
            ([
                'name'=>$request->name,
                'email'=>$request->email
                ]);
        }

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //DB::table('users')->where('id',$id)->delete
        // $todo=Todo::find($id);
        // $todo->delete();
        // return redirect('/todo')->with('message','Data Todo'.$todo->title.'Telah Dihapus');
        $query = DB::table('users')->where('id',$id);
        $user=$query->first();
        $query->delete();
        ///////
        return redirect('/user')->with('message','Data User'.$user->name.'Telah Dihapus');
    }
}
