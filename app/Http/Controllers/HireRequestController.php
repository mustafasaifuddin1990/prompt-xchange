<?php

namespace App\Http\Controllers;
use App\Models\HireRequest;
use App\Models\NotificationCenter;
use App\Models\Request_users;
use App\Models\User;
use App\Mail\HiringRequestNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class HireRequestController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'content_creator_id' => 'required|exists:users,id',
        ]);
//        6,639
        $userId = auth()->id();
        $user_details = User::where('id',$userId)->first();

        $contentCreatorId = $request->content_creator_id;
        $existingRequest = HireRequest::where('general_user_id', $userId)
            ->where('content_creator_id', $contentCreatorId)
            ->whereIn('status', ['pending', 'accepted'])
            ->first();

        if ($existingRequest) {
            return response()->json(['success' => false, 'message' => 'You have already sent a request to this content creator.']);
        }
        $hiringRequest = HireRequest::create([
            'general_user_id' => $userId,
            'content_creator_id' => $contentCreatorId,
            'status' => 'pending',
        ]);

        $new_notification = new NotificationCenter();
        $new_notification->sender_id = $userId;
        $new_notification->receiver_id = $contentCreatorId;
        $new_notification->message = $user_details->name." Has Requested To Hire.";
        $new_notification->status = 'in_progress';
        $new_notification->post_id = $contentCreatorId;
        $new_notification->request_id = $hiringRequest->id;
        $new_notification->save();

        $contentCreator = User::find($contentCreatorId);
        Mail::to($contentCreator->email)->send(new HiringRequestNotification($hiringRequest));
        return response()->json(['success' => true, 'message' => 'Your request has been sent']);
    }


    public function accept(Request $request)
    {
        $hiringRequest = HireRequest::find($request->id);
        $find_notification = NotificationCenter::find($request->notification_id);

        $sender_id  = $find_notification->sender_id;
        $receiver_id = $find_notification->receiver_id;

        $get_data = Request_users::where(function($query) use ($sender_id, $receiver_id) {
            $query->where('user_id', $sender_id)
                ->where('vendor_id', $receiver_id);
        })
            ->orWhere(function($query) use ($sender_id, $receiver_id) {
                $query->where('vendor_id', $sender_id)
                    ->where('user_id', $receiver_id);
            })
            ->get();

        if($hiringRequest){

            $hiringRequest->update(['status' => 'accepted']);
            $find_notification->update(['status' => 'accepted']);
            Mail::to($hiringRequest->generalUser->email)->send(new HiringRequestNotification($hiringRequest));

            if ($get_data->isEmpty()) {
                $store_data = new Request_users();
                $store_data->user_id = $sender_id;
                $store_data->vendor_id = $receiver_id;
                $store_data->count_request = 1;
                $store_data->save();


                $store_data_for_receiver = new Request_users();
                $store_data_for_receiver->user_id = $receiver_id;
                $store_data_for_receiver->vendor_id = $sender_id;
                $store_data_for_receiver->count_request = 1;
                $store_data_for_receiver->save();
            }

            return response()->json(data:['success' => true ,'message'=> 'Accepted'], status: 200);

        }else{
            return response()->json(data:['success' => false,'message'=> 'error updating'], status: 400);
        }

    }

    public function reject(Request $request)
    {
        $hiringRequest = HireRequest::find($request->id);
        $find_notification = NotificationCenter::find($request->notification_id);

        if($hiringRequest){

            $hiringRequest->update(['status' => 'rejected']);
            $find_notification->update(['status' => 'rejected']);

            Mail::to($hiringRequest->generalUser->email)->send(new HiringRequestNotification($hiringRequest));
            return response()->json(data:['success' => true ,'message'=> 'rejected'], status: 200);
        }else{
            return response()->json(data:['success' => false,'message'=> 'error updating'], status: 400);
        }
    }
}
