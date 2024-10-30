<?php

namespace App\Http\Controllers;

use App\Models\NotificationCenter;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getUserNotifications(Request $request)
    {
        $user_ID = $request->id;

        $all_messages = NotificationCenter::get_notification_between_two_users($user_ID);
        $all_result = $all_messages->orderBy('created_at', 'Desc')
            ->limit($request->limit ?? 100)
            ->get();
        if ($all_result->count()) {
            foreach ($all_result as $message) {
                $message->update(['seen' => 0]);



            }
        }

        return response()->json(["status" => true, "message" => $all_result], 200);
    }
}
