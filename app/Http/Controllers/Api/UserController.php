<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        if($validator->fails()){
            return response()->json(['status' => 'failed', 'validation_errors' => $validator->errors()]);
        }

        $inputs = $request->all();
        $inputs['password'] = Hash::make($request->password);
        $user = User::create($inputs);
        $user->assignRole([3]);

        if(!is_null($user)){
            return response()->json(['status' => 'success', 'message' => 'User registration successfully completed', 'data' => $user]);
        }else{
            return response()->json(['status' => 'failed', 'message' => 'Registration failed']);
        }
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['status' => 'failed', 'validation_errors' => $validator->errors()]);
        }

        $user = User::where('email', $request->email)->first();

        if(is_null($user)){
            return response()->json(['status' => 'failed', 'message' => 'Failed! User not found']);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            return response()->json(['status' => 'success', 'login' => true, 'token' => $token, 'data' => $user, 'message' => 'Success! User logged in']);
        }else{
            return response()->json(['status' => 'failed', 'success' => false, 'message' => 'Failed! Invalid password']);
        }
    }
}