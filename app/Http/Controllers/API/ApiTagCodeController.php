<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagCode\StoreRequest;
use App\Http\Requests\TagCode\UpdateRequest;
use App\Models\TagCode;
use Illuminate\Http\Request;

class ApiTagCodeController extends Controller
{
    public function index(Request $request)
    {
        $data = TagCode::when($request->has('keyword'), function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->keyword}%");
        })
            ->paginate($request->per_page ?? 10);
        return response()->json($data, 200);
    }

    public function store(StoreRequest $request)
    {
        $tagCode = new TagCode();
        $tagCode->name = $request->name;
        $tagCode->save();
        return response()->json($tagCode, 200);
    }

    public function show(TagCode $tagCode)
    {
        return response()->json($tagCode, 200);
    }

    public function update(UpdateRequest $request, TagCode $tagCode)
    {
        $tagCode->name = $request->name;
        $tagCode->update();
        return response()->json($tagCode, 200);
    }

    public function destroy(TagCode $tagCode)
    {
        $tagCode->delete();
        return response()->json($tagCode, 200);
    }
}
