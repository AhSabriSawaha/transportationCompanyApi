<?php

namespace App\Http\Controllers\Admin;

use App\Data\SettingData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\StoreSettingRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingRequest;
use App\Http\Resources\Admin\SettingResource;
use App\Models\Setting;
use App\Services\SettingService;

class SettingController extends Controller
{
    public function __construct(
        public SettingService $Settingervice
    )
    {}

    public function index()
    {
        $Setting = $this->Settingervice->get();

        return response()->json([
            'data' => SettingResource::collection($Setting)
        ]);

    }


    public function show(Setting $Setting)
    {
        return response()->json([
            'data' => SettingResource::make($Setting)
        ]);
    }


    public function store(StoreSettingRequest $request)
    {
        $Setting = $this->Settingervice->store(SettingData::from($request->validated()));

        return response()->json([
            'data' => SettingResource::make($Setting)
        ]);
    }

    public function update(UpdateSettingRequest $request, Setting $Setting)
    {
        $Setting = $this->Settingervice->update(SettingData::from($request->validated()), $Setting);
        return response()->json([
            'data' => SettingResource::make($Setting)
        ]);
    }

    public function delete(Setting $Setting)
    {
        $Setting->delete();

        return response()->json([
            'data' => 'true'
        ]);
    }


}
