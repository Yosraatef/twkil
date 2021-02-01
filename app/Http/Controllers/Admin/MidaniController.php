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
class MidaniController extends Controller
{

    public function index()
    {
      Session::put('page','midani');
      $midanies = User::where('type','midani')->orderBy('created_at', 'DESC')->get();
      return view('admin.midanies.show',compact('midanies'));
    }
    public function create()
    {
        $centers =  Center::all();
        $jobTitles  =  JobTitle::all();
        return view('admin.midanies.create',compact('centers','jobTitles'));
    }


    public function store(StoreUserAdmin $request)
    {
      $data = $request->except('type','password','api_token');
      $data['type']  = 'midani';
      $data['api_token'] = Str::random(60);
      $data['password'] = bcrypt($request->password);
      $midani = User::create($data);
      Session::flash('message' , ' اضافة قيادة ميدانيه بنجاح');
      return redirect()->route('midanies.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $midani = User::find($id);
      $centers =  Center::all();
      $jobTitles  =  JobTitle::all();
      return view('admin.midanies.edit',compact('midani','centers','jobTitles'));
    }

    public function update(Request $request, $id)
    {
      $midani = User::findOrFail($id);
      $data = $request->except('type','api_token','password');
      $data['type']  = 'midani';
      $data['api_token'] = Str::random(60);
      $data['password'] = bcrypt($request->password);
      $midani->update($data);
      Session::put('message','تم التعديل بشكل ناجح ');
      return redirect()->route('midanies.index');
    }

    public function destroy($id)
    {
      $midani = User::findOrFail($id);
      $midani->delete();
      Session::flash('message','تم  المسح بنجاح');
      return redirect()->back();
    }
}
