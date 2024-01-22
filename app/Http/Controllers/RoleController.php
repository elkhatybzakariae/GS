<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function roleindex(Request $request)
    {
        $roles = Role::all();
        return response()->json(['roles' => $roles]);
    }
    // public function rolecreate()
    // {
    //     return view('auth.superadmin.createrole');
    // }
    public function rolestore(Request $request)
    {
        $id = Helpers::generateIdRole();
        $validation = $request->validate([
            'role_name' => 'required|string|max:50',
            'AccessPOS' => 'required',
            'AccessBO' => 'required',
        ]);
        $role = Role::create([
            'id_R' => $id,
            'role_name' => $validation['role_name'],
            'AccessPOS' => $validation['AccessPOS'],
            'AccessBO' => $validation['AccessBO'],
        ]);
        return response()->json(['role' => $role]);
    }
    public function deleterole($id, Request $request)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['error' => 'Role not found'], 404);
        }
        $role->delete();
        return response()->json(['message' => 'Role deleted successfully']);
    }
}
