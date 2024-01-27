<?php


namespace App\Services;

use App\Data\NotificationData;
use App\Models\Notification;
use Spatie\QueryBuilder\QueryBuilder;

class NotificationService
{
    public function get()
    {
        return QueryBuilder::for(Notification::query())
            ->allowedFilters([
                'location_id',
            ])
            ->with(['trip'])   //if needed for them
            ->get();
    }

    public function store(NotificationData $data)
    {
        return Notification::create($data->toArray());
    }

    public function update(NotificationData $data, Notification $notification)
    {
        $notification->update($data->toArray());

        return $notification;
    }
}
