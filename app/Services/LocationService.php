<?php


namespace App\Services;

use App\Data\LocationData;
use App\Models\Category;
use App\Models\Location;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class LocationService
{
    public function get()
    {
        return QueryBuilder::for(Location::query())
            ->allowedFilters([
                'takeoff',
                'destination',
                AllowedFilter::exact('category_id')
                // AllowedFilter::exact('id')
            ])
            ->with(['trips'])
            ->get();
    }

    public function getByCategory(Category $category)
    {
        return QueryBuilder::for($category->locations())
            ->allowedFilters([
                'takeoff',
                'destination',
                // AllowedFilter::exact('id')
            ])
            ->with(['category'])
            ->get();
    }

    public function store(LocationData $data)
    {
        return Location::create($data->toArray());
    }

    public function update(LocationData $data,Location $location)
    {
        $location->update($data->toArray());

        return $location;
    }
}

