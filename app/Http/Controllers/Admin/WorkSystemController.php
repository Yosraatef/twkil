<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WorkSystem;
use Illuminate\Support\Facades\Session;
class WorkSystemController extends Controller
{

    public function index()
    {
      Session::put('page','worksystems');
      $worksystems = WorkSystem::orderBy('created_at', 'DESC')->get();
      return view('admin.worksystems.show',compact('worksystems'));
    }


    public function create()
    {
        return view('admin.worksystems.create');
    }

    public function store(Request $request)
    {
      $data = $request->all();
      $worksystem = WorkSystem::create($data);
      Session::flash('message' , ' اضافة نظام عمل بنجاح');
      return redirect()->route('worksystems.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $worksystem = WorkSystem::find($id);
      return view('admin.worksystems.edit',compact('worksystem'));
    }


    public function update(Request $request, $id)
    {
      $worksystem = WorkSystem::findOrFail($id);
      $data = $request->all();
      $worksystem->update($data);
      Session::put('message','تم التعديل بشكل ناجح ');
      return redirect()->route('worksystems.index');
    }

    public function destroy($id)
    {
      $worksystem = WorkSystem::findOrFail($id);
      $worksystem->delete();
      Session::flash('message','تم  المسح بنجاح');
      return redirect()->back();
    }
}
