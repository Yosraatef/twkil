<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Admin;
use Image;
use App\Agency;
use App\User;
use Hash;
use App\Http\Requests\LoginAdminValidation;
class AdminController extends Controller
{
    public function dashboard(){
      Session::put('page','dashboard');
       $noUsers = User::where('type','paramedic')->count();
       $noManger = User::where('type','manager')->count();
       $nomidani = User::where('type','midani')->count();
       $twkilat = Agency::count();
       return view('admin.admin_dashboard',compact('noUsers','noManger','nomidani','twkilat'));
    }
    public function settings(){
      Session::put('page','settings');
      $detailsAdmin = Admin::where('email',auth()->guard('admin')->user()->email)->first();
      return view('admin.admin_settings' , compact('detailsAdmin'));
    }
    public function login(Request $request){
       if($request->isMethod('post')){
      //   $rules =
      //      [
      //       'email'     => 'required|email|max:220',
      //       'password' => 'required',
      //       ];

        //$this->validate($request , $rules);
        $data = $request->all() ;
        if(auth()->guard('admin')->attempt(['email'=> $request->email , 'password'=>$request->password])){
          return redirect('admin/dashboard');
        }else{
          session::flash('error_message',trans('admin.error_login'));
          return redirect()->back();
        }
      }

        return view('admin.admin_login');
    }
    public function logout(){
        auth()->guard('admin')->logout();
        return view('admin.admin_login');
    }
    public function check_admin_pass(Request $request)
    {
      $data = $request->all();
      //echo "</pr>" ;print_r($data);die;

      if(Hash::check($data['currentPass'], Auth::guard('admin')->user()->password )){
        echo "true";
      }else{
          echo "false";
      }
    }
    public function updateAdminPass(Request $request)
    {

      if($request->isMethod('post')){
        $data = $request->all();
        //check if current password is correct
        if(Hash::check($data['currentPass'], Auth::guard('admin')->user()->password)){
          //check if new password confirmed with confirm Password
          if($data['newPass'] == $data['confirmPass']) {
             Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['newPass'])]);
             session::flash('success_message','Password has been Updated Successfully!');
          }else {
              session::flash('error_message','New Password and Confirm Password Is Not Match');
          }
        }else {
          session::flash('error_message','Current Password is Incorrect');
        }
        return redirect()->back();
      }
    }
    public function updateAdminDetails(Request $request){
      Session::put('page',"update_admin_details");
      if($request->isMethod('post')){
        $data = $request->all();
        $rules =
           [
            'name'     => 'required|regex:/^[\pL\s\-]+$/u',
            'phone'    => 'required|numeric',
            "image"    => 'image|mimes:jpeg,png,jpg,gif,svg',
            ];

        $this->validate($request , $rules);

        if($request->hasFile('image')) {
        //  dd('ddd');
              $imag_tmp = $request->file('image');
              if($imag_tmp->isValid()){
                $extention = $imag_tmp->getClientOriginalName();
                $imageName = time() . '-' . $extention;
                $filePath = 'images/admin_images/admin_photos/'.$imageName;
                Image::make($imag_tmp)->save($filePath);
              }else if(!empty($data['current_admin_image'])){
                $imageName = $data['current_admin_image'];
              }else{
                $imageName = " ";
              }
          }

        session::flash('success_message','Admin Details Has been Successfully!');
        Admin::where('email', Auth::guard('admin')->user()->email)->update(['name' => $data['name'], 'phone' => $data['phone'] , 'image' => $imageName]);
        return redirect()->back();
      }else{
        return view('admin.admin_update_details');
      }



    }
}
