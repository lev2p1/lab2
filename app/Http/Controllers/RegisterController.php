<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\Gender;
use Exception;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request){
        try{
            $v = Validator::make($request->all(), [
                'email' => 'email',
                'password' => 'required',
                'gender' => ['required', new Gender]
            ]);
    
            if($v->fails()) return response($v->errors(), 400);
    
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
            
            $s = [];
            $s['token'] = $user->createToken('api')->accessToken;
            $s['email'] = $user->email;
    
    
            return response(["Пользователь зарегистрирован", $s], 201);
        }
        catch(Exception $e){
            return response($e, 400);
        }
        
    }

    public function login(Request $request)
    {
        try{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
                $user = Auth::user(); 
                $success['token'] =  $user->createToken('api')-> accessToken; 
                $success['email'] =  $user->email;
       
                return response($success, 201);
            }
            else return response('Error', 400); 
        }
        catch(Exception $e){
            return $e;
        }
        
    }

    public function profile(Request $request){
        try{
            return response($request->user());
        }
        catch(Exception $e){
            return $e;
        }
    }
}
