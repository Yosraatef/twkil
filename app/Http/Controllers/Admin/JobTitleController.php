<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\JobTitle;
class JobTitleController extends Controller
{

    public function index()
    {
      Session::put('page','jobTitles');
      $jobTitles = JobTitle::orderBy('created_at', 'DESC')->get();
      return view('admin.jobTitles.show',compact('jobTitles'));
    }

    public function create()
    {

      return view('admin.jobTitles.create');
    }


    public function store(Request $request)
    {
      $data = $request->all();
      $jobTitle = JobTitle::create($data);
      Session::flash('message' , ' تم اضافة مسمى وظيفي جديد');
      return redirect()->route('jobTitles.index');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
      $jobTitle = JobTitle::find($id);
      return view('admin.jobTitles.edit',compact('jobTitle'));
    }


    public function update(Request $request, $id)
    {
      $jobTitle = JobTitle::findOrFail($id);
      $data = $request->all();
      $jobTitle->update($data);
      Session::put('message','تم التعديل بشكل ناجح ');
      return redirect()->route('jobTitles.index');
    }


    public function destroy($id)
    {
      $jobTitle = JobTitle::findOrFail($id);
      $jobTitle->delete();
      Session::flash('message','تم  المسح بنجاح');
      return redirect()->back();
    }
}
