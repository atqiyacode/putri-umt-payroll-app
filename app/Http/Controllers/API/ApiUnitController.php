<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Unit\StoreRequest;
use App\Http\Requests\Unit\UpdateRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class ApiUnitController extends Controller
{
    public function index(Request $request)
    {
        $data = Unit::when($request->has('keyword'), function ($query) use ($request) {
            $query->where('code', 'LIKE', "%{$request->keyword}%")
                ->orWhere('name', 'LIKE', "%{$request->keyword}%");
        })
            ->paginate($request->per_page ?? 10);
        return response()->json($data, 200);
    }

    public function store(StoreRequest $request)
    {
        $unit = new Unit();
        $unit->code = $request->code;
        $unit->name = $request->name;
        $unit->save();
        return response()->json($unit, 200);
    }

    public function show(Unit $unit)
    {
        return response()->json($unit, 200);
    }

    public function update(UpdateRequest $request, Unit $unit)
    {
        $unit->code = $request->code;
        $unit->name = $request->name;
        $unit->update();
        return response()->json($unit, 200);
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return response()->json($unit, 200);
    }
}
