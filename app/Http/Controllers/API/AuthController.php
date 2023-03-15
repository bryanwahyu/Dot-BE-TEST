<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User\Profile\Profile;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        $req->validate([
            'email'=>['required','unique:users'],
            'name'=>'required',
            'password'=>'required',
            'address'=>'required',
            'disability_id'=>'required',
            'gender'=>'required'
        ]);
        try {
            $data['user']=$req->except(['address','disability_id','gender','password']);
            $data['user']['password']=bcrypt($req->password);
            $user=User::create($data['user']);
            $dataprofile['user_id']=$user->id;
            $dataprofile['address']=$req->address;
            $dataprofile['gender']=$req->gender;
            $dataprofile['disability_id']=$req->disability_id;
            $dataprofile['full_name']=$user->name;
            Profile::create($dataprofile);

            return $this->success_json(code:200,data:$user,message:'success to register');

        } catch (\Throwable $th) {
            return $this->error_json(code:500,data:$th->getMessage(),message:"register failed");
        }
    }
    public function login(Request $req)
    {
     if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
            $data['token']=Auth::user()->createToken('test')->plainTextToken;
            $data['user']=Auth::user();
            return $this->success_json(code:200,data:$data,message:'Welcome');
     }else{
        return $this->error_json(code:400,data:'username and password are wrong',message:"fail to login");
     }
    }
    public function get_data_auth()
    {
        $auth=Auth::user();
        return $this->success_json(code:200,data:$auth,message:'data authorization');
    }
}
