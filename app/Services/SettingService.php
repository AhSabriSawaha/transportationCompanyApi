<?php


namespace App\Services;

use App\Data\SettingData;
use App\Models\Setting;
use Spatie\QueryBuilder\QueryBuilder;

class SettingService
{
    public function get()
    {
        return QueryBuilder::for(Setting::query())
            ->get();
    }

    public function store(SettingData $data)
    {
        return Setting::create($data->toArray());
    }

    public function update(SettingData $data, Setting $setting)
    {
        $setting->update($data->toArray());

        return $setting;
    }
}
