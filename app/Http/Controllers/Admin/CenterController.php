<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Center;
use App\WorkSystem;
use Illuminate\Support\Facades\Session;
class CenterController extends Controller
{

    public function index()
    {
      Session::put('page','centers');
      $centers = Center::orderBy('created_at', 'DESC')->get();
      return view('admin.centers.show',compact('centers'));
    }


    public function create()
    {
        $workSystems = WorkSystem::all();
        return view('admin.centers.create', compact('workSystems'));
    }


    public function store(Request $request)
    {
      $data = $request->all();
      $center = Center::create($data);
      Session::flash('message' , ' اضافة مركز اسعاف جديد');
      return redirect()->route('centers.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $center = Center::find($id);
      $workSystems = WorkSystem::all();
      return view('admin.centers.edit',compact('center','workSystems'));
    }

    public function update(Request $request, $id)
    {
      $center = Center::findOrFail($id);
      $data = $request->all();
      $center->update($data);
      Session::put('message','تم التعديل بشكل ناجح ');
      return redirect()->route('centers.index');
    }

    public function destroy($id)
    {
      $center = Center::findOrFail($id);
      $center->delete();
      Session::flash('message','تم  المسح بنجاح');
      return redirect()->back();
    }
}
