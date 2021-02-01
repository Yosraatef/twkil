<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAdmin;
use Illuminate\Http\Request;
use App\User;
use App\Center;
use App\JobTitle;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class UserController extends Controller
{

    public function index()
    {
      Session::put('page','users');
      $users = User::where('type','paramedic')->orderBy('created_at', 'DESC')->get();
      return view('admin.users.show',compact('users'));
    }

    public function create()
    {
      $centers =  Center::all();
      $jobTitles =  JobTitle::all();
      return view('admin.users.create',compact('centers','jobTitles'));
    }
    public function store(StoreUserAdmin $request)
    {

      $data = $request->except('type','password','api_token');
      $data['type']  = 'paramedic';
      $data['remember_token'] = Str::random(60);
      $data['password'] = bcrypt($request->password);
      $user = User::create($data);
      Session::flash('message' , 'تم اضافة المسعف بنجاح');
      return redirect()->route('users.index');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $user = User::find($id);
        $centers =  Center::all();
        $jobTitles =  JobTitle::all();
        return view('admin.users.edit',compact('user','centers','jobTitles'));
    }
    public function update(Request $request, $id)
    {

         $user = User::findOrFail($id);
         $data = $request->except('type','api_token','password');
         $data['type']  ='paramedic';
         $data['api_token'] = Str::random(60);
         $data['password'] = bcrypt($request->password);
         $user->update($data);
         Session::put('message','تم التعديل بشكل ناجح ');
         return redirect()->route('users.index');
    }
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      Session::flash('message','تم  المسح بنجاح');
      return redirect()->back();
    }
}
