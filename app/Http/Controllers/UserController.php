<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function register(Request $request)
    {
        //
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if ($user->save()){
            return response()->json([
                'message' => 'User created successfully',
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error creating new user',
                'status_code' => 500
            ], 500);
        }
    }

    
    public function login(Request $request){
        $request->validate([
            'password' => 'required|string',
            'email' => 'required|string|email',
            'remember_me' => 'boolean'
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json([
                'message' => 'Invalid username/password',
                'status_code' => 401
            ], 401);
        }

        $user = $request->user();

        if ($user->role == 'administrator'){
            $tokenData = $user->createToken('Personal Access Token', ['administrator']);
        } else {
            $tokenData = $user->createToken('Personal Access Token', ['user']);
        }

        $token = $tokenData->token;

        if ($request->remember_me){
            $token->expired_at = Carbon::now()->addWeeks();
        }

        if ($token->save()){
            return response()->json([
                'user' => $user,
                'access_token' => $tokenData->accessToken,
                'token_type' => 'Bearer',
                'token_scope' => $tokenData->token->scope[0],
                'expired_at' => Carbon::parse($tokenData->token->expired_at)->toDayDateTimeString(),
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Some error occurred, try again',
                'status_code' => 500
            ], 500);
        }
    }

    public function logout(Request $request){

        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Logout successfully',
            'status_code' => 200
        ], 200);

    }

    public function profile(){

        if(Auth::user()){
            
            return response()->json(Auth::user(), 200);

        } else {
            
            return response()->json([
                'message' => 'Not Logged In',
                'status_code' => 500
            ], 500);

        }

    }
}
