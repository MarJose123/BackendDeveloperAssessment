<?php
/*
 * Copyright (c) 2023. LF Backend Developer Assessment by Josie Noli Darang.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        if(!$request->has('email') || !$request->has('password')) return response()->json([
            'status' => 'failed',
            'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message' => 'Email address and Password is required.'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);


        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json([
                'status' => 'failed',
                'code' => Response::HTTP_UNAUTHORIZED,
                'message' => 'Unable to unauthorized login credential'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'status' => 'success',
            'code' => Response::HTTP_OK,
            'message' =>  'Successfully Logged in',
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ], Response::HTTP_OK);

    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => 'success',
            'code' => Response::HTTP_OK,
            'message' =>  'Successfully logged out',
        ], Response::HTTP_OK);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'code' => Response::HTTP_OK,
            'message' =>  'Successfully refreshed',
            'data' => [
                'access_token' => auth()->refresh(),
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ], Response::HTTP_OK);
    }


    public function me()
    {
        return response()->json([
            'status' => 'success',
            'code' => Response::HTTP_OK,
            'message' => null,
            'data' => auth()->user()
        ], Response::HTTP_OK);
    }
}
