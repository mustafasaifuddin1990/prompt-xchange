<?php

namespace App\Http\Controllers\ChatSystem;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Request_users;

class RequestChatController extends Controller
{
    public function requested_users(request $request){
        $accepted_users = [];
        $excludedUserId = $request->user_id;

        $all_user = User::where('id', '!=', $excludedUserId)
            ->get();


        foreach($all_user as $user){
            $accepted_requests = Request_users::where('user_id', '=', $excludedUserId)
                ->get();
            foreach($accepted_requests as $request_id){


                $vendor_users = User::where('id', $request_id->vendor_id)
                    ->where('id', '!=', $excludedUserId)
                    ->get();
                foreach($vendor_users as $vendor_user){

                    $get_first_message = Messages::where('receiver_id', '=', $vendor_user->id)
                        ->where('sender_id', '=', $excludedUserId)
                        ->orWhere('receiver_id', '=', $excludedUserId)
                        ->orWhere('sender_id', '=', $vendor_user->id)
                        ->orderBy('created_at','DESC')
                        ->first();
                    if (!$accepted_requests->isEmpty()) {
                        $accepted_users[$vendor_user->id] = $vendor_user;

                        if ($get_first_message === NULL){
                            $accepted_users[$vendor_user->id]->current_message= '';
                            $accepted_users[$vendor_user->id]->time_ago = '';
                        }
                        else{
                            if ($get_first_message->content === null){
                                $accepted_users[$vendor_user->id]->current_message= '';
                            }else{
                                $accepted_users[$vendor_user->id]->current_message = Str::limit($get_first_message->content, 18);
                            }

                            $accepted_users[$vendor_user->id]->time_ago = $get_first_message->time_ago;
                        }

                    }


                }
            }
        }

        if (!empty($accepted_users)) {
            return response()->json(["users" => $accepted_users]);
        }
        return response()->json(["users"=> '']);
    }

    public function user_request_chat(Request $request)
    {
        $sender_id = $request->sender_id;
        $receiver_id = $request->receiver_id;

        $get_data = Request_users::where(function($query) use ($sender_id, $receiver_id) {
            $query->where('user_id', $sender_id)
                ->where('vendor_id', $receiver_id);
        })
            ->orWhere(function($query) use ($sender_id, $receiver_id) {
                $query->where('vendor_id', $sender_id)
                    ->where('user_id', $receiver_id);
            })
            ->get();

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

        return response()->json(["status" => true], 200);
    }
}
