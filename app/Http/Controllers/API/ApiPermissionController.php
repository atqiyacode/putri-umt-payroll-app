<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StoreRequest;
use App\Http\Requests\Permission\UpdateRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class ApiPermissionController extends Controller
{

    public function index(Request $request)
    {
        $data = Permission::when($request->has('keyword'), function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->keyword}%")
                ->orWhere('guard_name', 'LIKE', "%{$request->keyword}%");
        })
            ->paginate($request->per_page ?? 10);
        return response()->json($data, 200);
    }

    public function store(StoreRequest $request)
    {
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->save();
        return response()->json($permission, 200);
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return response()->json($permission, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->update();
        return response()->json($permission, 200);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return response()->json($permission, 200);
    }
}
