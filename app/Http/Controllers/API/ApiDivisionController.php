<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Division\StoreRequest;
use App\Http\Requests\Division\UpdateRequest;
use App\Models\Division;
use Illuminate\Http\Request;

class ApiDivisionController extends Controller
{
    public function index(Request $request)
    {
        $data = Division::when($request->has('keyword'), function ($query) use ($request) {
            $query->where('code', 'LIKE', "%{$request->keyword}%")
                ->orWhere('name', 'LIKE', "%{$request->keyword}%");
        })
            ->paginate($request->per_page ?? 10);
        return response()->json($data, 200);
    }

    public function store(StoreRequest $request)
    {
        $division = new Division();
        $division->code = $request->code;
        $division->name = $request->name;
        $division->save();
        return response()->json($division, 200);
    }

    public function show(Division $division)
    {
        return response()->json($division, 200);
    }

    public function update(UpdateRequest $request, Division $division)
    {
        $division->code = $request->code;
        $division->name = $request->name;
        $division->update();
        return response()->json($division, 200);
    }

    public function destroy(Division $division)
    {
        $division->delete();
        return response()->json($division, 200);
    }
}
