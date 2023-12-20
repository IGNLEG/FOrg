<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
class UserController extends Controller
{
    public function register(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        if($validation->fails()){
            return response()->json($validation->errors(), 202);
        }
        $allData = $request->all();
        $user = User::create($allData);

        $resArr = [];
        $resArr['token'] = $user->createToken('api-app')->accessToken;
        $resArr['name'] = $user->name;
        return response()->json($resArr, 200);
    }

    public function login(Request $request)
    {
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            $user = Auth::user();
            $resArr = [];
            $resArr['token'] = $user->createToken('api-app')->accessToken;
            $resArr['name'] = $user->name;
            return response()->json($resArr, 200);
        }
        else{
            return response()->json(['error'=>'Unauthorized Access'], 202);
        }
    }
    public function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'successfully logged out'];
        return response()->json($response, 200);
    }

}
