<?php


namespace App\Services;

use App\Data\TripData;
use App\Models\Category;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TripService
{
    public function get()
    {
        return QueryBuilder::for(Trip::query())
            ->allowedFilters([
                'price',
                AllowedFilter::exact('location_id')
            ])
            ->with(['location', 'vehicle'])
            ->get();
    }

    public function getByUser(User $user)
    {
        return QueryBuilder::for(Trip::query())
            ->whereBelongsTo($user)
            ->get();
    }

    public function store(TripData $data)
    {
        return Trip::create($data->toArray());
    }

    public function update(TripData $data, Trip $trip)
    {
        $trip->update($data->toArray());

        return $trip;
    }


    public function sumPrices()
    {
        return Trip::query()
            ->sum('price');
    }

    public function sumPricesByCategory(Category $category)
    {
        return Trip::query()
            ->whereHas('location', function ($query) use ($category) {
                $query->whereHas('category', function ($query) use ($category) {
                    $query->whereId($category->id)
                        ->where('name', 'airline');
                })
                    ->where('destination', 'aleppo')
                    ->whereYear('created_at', '>', '2023')
                    ->whereNull('take_off');
            })
            ->whereHas('vechicle', function ($query) {
                $query->where('full_seat_number', '>', 1000);
            })
            // ->whereRelation('vechicle','full_seat_number','>',1000)
            ->where(function ($query) {
                $query->where('duration', '>', 1000)
                    ->orWhereMonth('start_time', '>', 6);
            })
            ->sum('price');
    }

    public function sumPricesGroupedByLocationId()
    {
        return Trip::query()
            ->select(['location_id',DB::raw('SUM(price)')])
            ->groupBy('location_id')
            ->get();
    }
}
