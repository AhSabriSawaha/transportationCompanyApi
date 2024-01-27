<?php


namespace App\Services;

use App\Data\SeatData;
use App\Models\Seat;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

use function PHPUnit\Framework\callback;

class SeatService
{
    public function get()
    {
        return QueryBuilder::for(Seat::query())
            ->allowedFilters([
            // 'full_seat_number',
                AllowedFilter::callback('trip_id', function (Builder $query, $value) {
                    $query->whereHas('vehicle', function ($query) use ($value) {
                        $query->where('trip_id', $value);
                    });
                }),
            ])
            ->with(['reservation', 'vehicle'])
            ->get();
    }

    public function store(SeatData $data)
    {
        return Seat::create($data->toArray());
    }

    public function update(SeatData $data, Seat $seat)
    {
        $seat->update($data->toArray());

        return $seat;
    }
}
