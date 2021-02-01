<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\User;
use App\Center;
use App\JobTitle;
use App\Http\Requests\StoreUserAdmin;
class ManagerController extends Controller
{

    public function index()
    {
      Session::put('page','managers');
      $managers = User::where('type','manager')->orderBy('created_at', 'DESC')->get();
      return view('admin.managers.show',compact('managers'));
    }

    public function create()
    {
        $centers =  Center::all();
        $jobTitles  =  JobTitle::all();
        return view('admin.managers.create',compact('centers','jobTitles'));
    }
    public function store(StoreUserAdmin $request)
    {

      $data = $request->except('type','password','api_token');
      $data['type']  = 'manager';
      $data['api_token'] = Str::random(60);
      $data['password'] = bcrypt($request->password);
      $manager = User::create($data);
      //  dd($manager->type);
      Session::flash('message' , 'تم اضافة مدير جديد بنجاح');
      return redirect()->route('managers.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
      $manager = User::find($id);
      $centers =  Center::all();
      $jobTitles  =  JobTitle::all();
      return view('admin.managers.edit',compact('manager','centers','jobTitles'));
    }

    public function update(Request $request, $id)
    {
      $manager = User::findOrFail($id);
      $data = $request->except('type','api_token','password');
      $data['type']  = 'manager';
      $data['api_token'] = Str::random(60);
      $data['password'] = bcrypt($request->password);
      $manager->update($data);
      Session::put('message','تم التعديل بشكل ناجح ');
      return redirect()->route('managers.index');
    }


    public function destroy($id)
    {
      $manager = User::findOrFail($id);
      $manager->delete();
      Session::flash('message','تم  المسح بنجاح');
      return redirect()->back();
    }
}
