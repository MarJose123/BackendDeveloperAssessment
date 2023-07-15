<?php
/*
 * Copyright (c) 2023. LF Backend Developer Assessment by Josie Noli Darang.
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function roleList()
    {
        return response()->json([
            'status' => 'success',
            'code' => Response::HTTP_OK,
            'message' =>  'List of all Role',
            'count' => Role::count(),
            'data' => Role::all()
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        if(!$request->hasAny(['role_name', 'permissions'])) return response()->json([
            'status' => 'failed',
            'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message' => 'role_name address and permissions is required.'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);

        /*
         * Creation and Storing the DB
         */


    }
    public function permissionList()
    {
        return response()->json([
            'status' => 'success',
            'code' => Response::HTTP_OK,
            'message' =>  'List of all Permission',
            'count' => Permission::count(),
            'data' => Permission::all()
        ], Response::HTTP_OK);
    }
}
