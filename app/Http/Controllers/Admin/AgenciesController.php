<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agency;
use Illuminate\Support\Facades\Session;

class AgenciesController extends Controller
{

    public function index()
    {
      Session::put('page','agencies');
      $agencies = Agency::orderBy('created_at', 'DESC')->get();
      return view('admin.twkilat.show',compact('agencies'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
