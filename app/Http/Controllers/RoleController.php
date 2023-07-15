<?php
/*
 * Copyright (c) 2023. LF Backend Developer Assessment by Josie Noli Darang.
 */

namespace App\Http\Controllers;

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
