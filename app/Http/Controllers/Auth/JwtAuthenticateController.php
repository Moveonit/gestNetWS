<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Utente;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;
use Tymon\JWTAuth\Middleware\RefreshToken;


class JwtAuthenticateController extends Controller
{
    /*
     * public function _construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }*/

    public function index()
    {
        return response()->json(['auth'=>Auth::user(), 'users'=>Utente::all()]);
    }

    public function  show($id) {
        return Utente::find($id);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('Nome_utente', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

    public function me()
    {
        return JWTAuth::parseToken()->toUser();
    }

    public function createRole(Request $request){
        // Todo
    }

    public function createPermission(Request $request){
        // Todo
    }

    public function assignRole(Request $request){
        // Todo
    }

    public function attachPermission(Request $request){
        // Todo
    }

}
