<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\EquipmentTypeResource;
use App\Models\EquipmentType;
use App\Models\Equipment;

class EquipmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //в целях экономии времени не делал класс фильтра, контроллер можно сделать чище
        // фильтрация не вынесена в отдельный класс, так же можно создать трейт

        $query = EquipmentType::select();

        if ($request->filled('id')) {
            $query->where('id', $request->get('id'));
        }

        if ($request->filled('name')) {
            $query->where('name', $request->get('name'));
        }

        if  ($request->filled('mask')) {
            $query->where('mask', $request->get('mask'));
        }

        $equipmentType = $query->get();

        return  EquipmentTypeResource::collection($equipmentType);

    }

}
