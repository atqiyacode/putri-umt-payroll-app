<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Http\Requests\Group\StoreRequest;
use App\Http\Requests\Group\UpdateRequest;
use Illuminate\Http\Request;

class ApiGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Group::when($request->has('keyword'), function ($query) use ($request) {
            $query->where('code', 'LIKE', "%{$request->keyword}%")
                ->orWhere('name', 'LIKE', "%{$request->keyword}%");
        })
            ->paginate($request->per_page ?? 10);
        return response()->json($data, 200);
    }

    public function store(StoreRequest $request)
    {
        $group = new Group();
        $group->code = $request->code;
        $group->name = $request->name;
        $group->save();
        return response()->json($group, 200);
    }

    public function show(Group $group)
    {
        return response()->json($group, 200);
    }

    public function update(UpdateRequest $request, Group $group)
    {
        $group->code = $request->code;
        $group->name = $request->name;
        $group->update();
        return response()->json($group, 200);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return response()->json($group, 200);
    }
}
