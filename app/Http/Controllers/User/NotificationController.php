<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\NotificationResource;
use App\Models\Notification;
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
}
