<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class ApiRoleController extends Controller
{

    public function index(Request $request)
    {
        $data = Role::when($request->has('keyword'), function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->keyword}%")
                ->orWhere('guard_name', 'LIKE', "%{$request->keyword}%");
        })
            ->paginate($request->per_page ?? 10);
        return response()->json($data, 200);
    }

    public function store(StoreRequest $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();
        return response()->json($role, 200);
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->update();
        return response()->json($role, 200);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json($role, 200);
    }
}
