<?php

namespace App\Http\Controllers;

use App\Models\StatusType;
use App\Http\Requests\StoreStatusTypeRequest;
use App\Http\Requests\UpdateStatusTypeRequest;
use Illuminate\Http\Request;

class StatusTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'data' => StatusType::paginate(10),
            'pageName' => trans('lang.status-type')
        ];
        return view('mobile.master.status-type-list', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStatusTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusTypeRequest $request)
    {
        $data = StatusType::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => __('messages.success.save'),
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusType  $statusType
     * @return \Illuminate\Http\Response
     */
    public function show(StatusType $statusType)
    {
        return response()->json([
            'status' => 200,
            'data' => $statusType
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusTypeRequest  $request
     * @param  \App\Models\StatusType  $statusType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusTypeRequest $request, StatusType $statusType)
    {
        $statusType->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => __('messages.success.update'),
            'data' => $statusType
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusType  $statusType
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusType $statusType)
    {
        $statusType->delete();
        return response()->json([
            'status' => 200,
            'message' => __('messages.success.delete'),
        ], 200);
    }

    public function edit(StatusType $statusType)
    {
        $data = [
            'pageName' => trans('messages.modal.update'),
            'statusType' => $statusType,
        ];

        return view('mobile.master.status-type-form', $data);
    }

    public function create()
    {
        $data = [
            'pageName' => trans('messages.modal.new'),
        ];
        return view('mobile.master.status-type-form', $data);
    }
}
