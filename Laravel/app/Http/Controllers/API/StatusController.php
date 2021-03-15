<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(['success' => true, 'data' => Status::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'text' => 'required|string',
            'user_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response(['success' => false, 'error' => $validator->errors()], 422);
        }

        Status::create([
            'text' => $request->text,
            'user_id' => $request->user_id,
        ]);
        return response(['success' => true, 'message' => 'Story Success Fully Create!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'text' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response(['success' => false, 'error' => $validator->errors()], 422);
        }
        $status->update([
            'text' => $request->text,
            'user_id' => $request->user_id
        ]);
        return response(['success' => true, 'message' => 'Story Success Fully Update!!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        return response(['success' => $status->delete(), 'message' => 'Stroy Deleted !!'], 200);
    }
}
