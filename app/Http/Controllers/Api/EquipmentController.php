<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipmentRequest;
use App\Models\EquipmentType;
use Illuminate\Http\Request;
use App\Http\Resources\EquipmentResource;
use App\Models\Equipment;
use function GuzzleHttp\Promise\all;


class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Equipment::select();

        if ($request->filled('id')) {
            $query->where('id', $request->get('id'));
        }

        if ($request->filled('serial_number')) {
            $query->where('serial_number', $request->get('serial_number'));
        }

        if  ($request->filled('comment')) {
            $query->where('comment', $request->get('comment'));
        }

        $equipment = $query->get();

        return  EquipmentResource::collection($equipment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\EquipmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentRequest $request)
    {
        $equipment = Equipment::create($request->all());

        if($equipment->fails()) {
            return response()->json($equipment->errors());
        }

        $equipment = Equipment::create([
            'serial_number' => $request->serial_number,
            'comment' => $request->comment,
        ]);

        return response()->json(['Equipment created', new EquipmentResource($equipment)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $id)
    {
        $equipment = Equipment::find($id);

        if (is_null($equipment)) {
            return response()->json([
                'message'=> 'Equipment nit found.'
            ], 404);
        }
        return  EquipmentResource::collection($equipment);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $id)
    {
        $equipment = Equipment::find($id);

        if(is_null($equipment)){
            return response()->json('Введен не существующий id', $equipment->errors());
        }

        $equipment->serial_number = $request->serial_number;
        $equipment->comment = $request->comment;
        $equipment->save();

        return response()->json(['Equipment updated.', new EquipmentResource($equipment)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $id)
    {
        $equipment = Equipment::find($id);

        if (isset($equipment)) {
            $id->delete();

            return response()->json([
                'status' => true,
                'message'=> 'Equipment deleted'
            ], 200);
        }
        return response()->json([
            'message'=> 'Equipment not found.'
        ], 404);
    }
}
