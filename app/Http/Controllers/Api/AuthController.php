<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\api\LoginAuthController;
use App\Http\Requests\api\UsersInCenterRequest;
use App\Http\Requests\api\AddAgencyRequest;
use App\Http\Resources\Login;
use App\Http\Resources\AddAgencyResource;
use App\User;
use App\Center;
use App\Agency;
use Validator;
use Carbon\Carbon;
use App\Http\Resources\UserResource as UserResource;
class AuthController extends Controller
{
    public function login(LoginAuthController $request){
            if (auth()->attempt(['codeJob' =>$request->input('codeJob'),'password' =>$request->input('password')])){
                $user = auth()->user();
                $user->device_token = $request->device_token;
                $user->save();
                $user = new Login($user);
                  return response(['msg' =>true ,'data' => $user],200);
            }else {
                 return response(['msg' =>false ,'data' => 'Incorrect codeJob or Password '],400);

            }

    }
    public function usersInCenter(UsersInCenterRequest $request)
    {
      if(auth()->guard('api')->user()){
        $usersCenter = User::where(['center_id'=> $request->center_id , 'type' => 'paramedic'])->get();
        $usersCenterr =  UserResource::collection($usersCenter);
        return response(['msg' =>true ,'data' => $usersCenterr ],200);
      }else{
        return response(['msg' =>false ,'data' => 'Incorrect api token '],400);
      }
    }

    public function addAgency(AddAgencyRequest $request){
        $user = auth()->guard('api')->user();
        if($user){
            $noAgency = Agency::where('mowkel_id' , $user->id)->whereMonth('created_at', Carbon::now()->month)->count();
            $center = Center::where('id',$user->center_id)->first();
            if($noAgency < $center->workSystem->noAgency ){
                $data = $request->except('mowkel_id','mtawkel_id','center_id');
                $data['mowkel_id'] = $user->id;
                $data['mtawkel_id'] = $request->user_id;
                $data['center_id'] = $user->center_id;
                $agency = Agency::create($data);
                $agencyResponse = new AddAgencyResource($agency);
                $user->noAgencyInMonth += 1;
                $user->save();
                return response(['msg' =>true ,'data' => $agencyResponse ] , 201);
            }else{
              $user->noAgencyInMonth = 0;
              $user->save();
              return response(['msg' =>false ,'data' => 'can not make agency  in this month ' ] , 400);
            }

        }else{
          return response(['msg' =>false ,'data' => 'Incorrect api token '],400);
        }
    }
}
