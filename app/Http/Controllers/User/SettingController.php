<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
}
