<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
// use App\Http\Requests\Admin_login_request;
use App\Traits\GeneralTraits;
use Illuminate\Support\Facades\Validator;
use Auth;

class AuthController extends Controller
{
    use GeneralTraits;

    public function login(Request $request){
        //Validation 
        try {
            $rule = [
                'email'         => 'required',
                'password'      => 'required',
            ];       
            $message = [
                'email.required'      => 'the fields is required',
                'password.required'      => 'the fields is required',
            ];
     
            $validator = Validator::make($request->all(), $rule);
            if($validator->fails()){
                return response()->json(['status' => false, 'code' => 'Error3001', 'msg' => 'Email Or Password is required']);
            }
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'code' => $ex->getCode(), 'msg' => $ex->getMessage()]);                
        }

        //login
        $credential = $request->only(['email','password']);
        $token = Auth::guard('admin-api')->attempt($credential);

        return $this->returnData('admin', $token,'login success');

        if (!$token)
            return $this->returnError('ERROR100','the information is invalid please try again');

        //return Token

    }
}
