<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Duration\StoreRequest;
use App\Http\Requests\Duration\UpdateRequest;
use App\Models\Duration;
use Illuminate\Http\Request;

class ApiDurationController extends Controller
{
    public function index(Request $request)
    {
        $data = Duration::when($request->has('keyword'), function ($query) use ($request) {
            $query->where('label', 'LIKE', "%{$request->keyword}%");
        })
            ->paginate($request->per_page ?? 10);
        return response()->json($data, 200);
    }

    public function store(StoreRequest $request)
    {
        $duration = new Duration();
        $duration->label = $request->label;
        $duration->save();
        return response()->json($duration, 200);
    }

    public function show(Duration $duration)
    {
        return response()->json($duration, 200);
    }

    public function update(UpdateRequest $request, Duration $duration)
    {
        $duration->label = $request->label;
        $duration->update();
        return response()->json($duration, 200);
    }

    public function destroy(Duration $duration)
    {
        $duration->delete();
        return response()->json($duration, 200);
    }
}
