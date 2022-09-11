<?php

namespace App\Http\Controllers;

use App\Events\Notify;
use App\Models\notification;
use Illuminate\Http\Request;
use Pusher\Pusher;

class PusherNotificationController extends Controller
{
    public function index()
    {
        $notifications = notification::all()->sortByDesc('id');
        return view('notification',compact('notifications'));
    }
    public function notification()
    {
            $notification = new  notification();
            $name= "Yasser";
            $notification->title = $name . " liked your status";
            $notification->save();
        event(new Notify($name));
        return "Event has been sent!";

    }
}
