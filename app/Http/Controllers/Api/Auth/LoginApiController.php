<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginApiRequest;
use Illuminate\Support\Facades\Auth;
use function env;
use function response;


class LoginApiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginApiRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if(!Auth::attempt($credentials)){
            return response([
                "message" => "Usuario y/o contraseña invalido"
            ], 401);
        }

        $accessToken = Auth::user()->createToken(env('PASSPORT_CLIENT_SECRET'))->accessToken;
        return response([
            "user" => Auth::user(),
            "access_token" => $accessToken,
        ]);
    }
}
