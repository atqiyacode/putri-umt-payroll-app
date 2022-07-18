<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusType\StoreRequest;
use App\Http\Requests\StatusType\UpdateRequest;
use App\Models\StatusType;
use Illuminate\Http\Request;

class ApiStatusTypeController extends Controller
{

    public function index(Request $request)
    {
        $data = StatusType::when($request->has('keyword'), function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->keyword}%");
        })
            ->paginate($request->per_page ?? 10);
        return response()->json($data, 200);
    }

    public function store(StoreRequest $request)
    {
        $statusType = new StatusType();
        $statusType->name = $request->name;
        $statusType->save();
        return response()->json($statusType, 200);
    }

    public function show($id)
    {
        $statusType = StatusType::findOrFail($id);
        return response()->json($statusType, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        $statusType = StatusType::findOrFail($id);
        $statusType->name = $request->name;
        $statusType->update();
        return response()->json($statusType, 200);
    }

    public function destroy($id)
    {
        $statusType = StatusType::findOrFail($id);
        $statusType->delete();
        return response()->json($statusType, 200);
    }
}
