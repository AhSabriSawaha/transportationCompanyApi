<?php

namespace App\Http\Controllers\Admin;

use App\Data\NotificationData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notification\StoreNotificationRequest;
use App\Http\Requests\Admin\Notification\UpdateNotificationRequest;
use App\Http\Resources\Admin\NotificationResource;
use App\Models\Notification;
use App\Services\FileService;
use App\Services\NotificationService;

class NotificationController extends Controller
{
    public function __construct(
        public NotificationService $notificationService,
        // public FileService $fileService
    )
    {}
    public function index()
    {
        $notifications = $this->notificationService->get();

        return response()->json([
            'data' => NotificationResource::collection($notifications)
        ]);

    }


    public function show(Notification $notification)
    {
        // if needed for the location and trip in the show

        // $notification->load([
        //     'trip','location'
        // ]);
        return response()->json([
            'data' => NotificationResource::make($notification)
        ]);
    }


    public function store(StoreNotificationRequest $request)
    {
        $validated = $request->validated();

        $file = $validated['file'];

        $notification = $this->notificationService->store(NotificationData::from($validated));

        FileService::uploadImage($notification, $file, 'images');

        return response()->json([
            'data' => NotificationResource::make($notification)
        ]);
    }

    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $notification = $this->notificationService->update(NotificationData::from($request->validated()), $notification);
        return response()->json([
            'data' => NotificationResource::make($notification)
        ]);
    }

    public function delete(Notification $notification)
    {
        $notification->delete();

        return response()->json([
            'data' => 'true'
        ]);
    }


}
