<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\PromptGeneration;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Likes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\NotificationCenter;

class LikeController extends Controller
{
    public function add_remove_like(Request $request){

        $user_ID  = $request->input('user_id');
        $post_ID  = $request->input('post_id');
        $item_type = $request->input('item_type');

        $user_details = User::where('id',$user_ID)->first();

        $data_like_check  = Likes::where('user_id',$user_ID)
            ->where('post_id',$post_ID)
            ->where('item_type',$item_type)
            ->first();

        if (!$data_like_check){

            $create_like = new Likes();
            $create_like->user_id = $user_ID;
            $create_like->post_id = $post_ID;
            $create_like->item_type = $item_type;
            $create_like->liked = 'heart';
            $create_like->save();

            if($user_ID != $post_ID){
                $new_notification = new NotificationCenter();
                $new_notification->sender_id =$user_ID;
                $new_notification->receiver_id =$post_ID;
                $new_notification->message = $user_details->name." Has liked your profile";
                $new_notification->status = 'send';
                $new_notification->post_id =$post_ID;
                $new_notification->save();
            }

            return response()->json(data:['liked' => 'heart'], status: 200);

        } else if ($data_like_check){
            if ($data_like_check->liked === 'heart'){

                $update_like = $data_like_check->update(['liked' => 'disheart']);
                return response()->json(data: ['liked' => "disheart"], status: 201);

            }else if($data_like_check->liked === 'disheart'){

                if($user_ID != $post_ID){
                    $new_notification = new NotificationCenter();
                    $new_notification->sender_id =$user_ID;
                    $new_notification->receiver_id =$post_ID;
                    $new_notification->message = $user_details->name." Has liked your profile";
                    $new_notification->status = 'send';
                    $new_notification->post_id =$post_ID;
                    $new_notification->save();
                }

                $update_like = $data_like_check->update(['liked' => 'heart']);
                return response()->json(data: ['liked' => "heart"], status: 201);
            }

        }

    }

    public function add_remove_comments_like(Request $request){

        $user_ID  = $request->input('user_id');
        if ($user_ID === null){
            $user_ID = Auth::user()->id;
        }
        $post_ID  = $request->input('post_id');
        $item_type = $request->input('item_type');
        $comment_id = $request->input('comment_id');
        $post_data = PromptGeneration::where('id', $post_ID)->first();
        $user_details = User::where('id',$user_ID)->first();
        $data_like_check  = Likes::where('user_id',$user_ID)
            ->where('post_id',$post_ID)
            ->where('item_type',$item_type)
            ->where('comment_ids',$comment_id)
            ->first();

        if (!$data_like_check){

            $create_like = new Likes();
            $create_like->user_id = $user_ID;
            $create_like->post_id = $post_ID;
            $create_like->item_type = $item_type;
            $create_like->comment_ids = $comment_id;
            $create_like->liked = 'heart';
            $create_like->save();

            if($user_ID != $post_data->user_id){
                $new_notification = new NotificationCenter();
                $new_notification->sender_id = $user_ID;
                $new_notification->receiver_id = $post_data->user_id;
                $new_notification->message = $user_details->name." Has liked your comment";
                $new_notification->status = 'send';
                $new_notification->post_id = $post_ID;
                $new_notification->comment_id = $comment_id;
                $new_notification->save();
            }
            return response()->json(data:['liked' => 'heart', 'notifi'=>$new_notification], status: 200);
        } else if ($data_like_check){
            if ($data_like_check->liked === 'heart'){
                $update_like = $data_like_check->update(['liked' => 'disheart']);
                return response()->json(data: ['liked' => "disheart"], status: 201);

            }else if($data_like_check->liked === 'disheart'){
                if($user_ID != $post_data->user_id){
                    $new_notification = new NotificationCenter();
                    $new_notification->sender_id = $user_ID;
                    $new_notification->receiver_id = $post_data->user_id;
                    $new_notification->message = $user_details->name." Has liked your comment";
                    $new_notification->status = 'send';
                    $new_notification->post_id = $post_ID;
                    $new_notification->comment_id = $comment_id;
                    $new_notification->save();
                }
                $update_like = $data_like_check->update(['liked' => 'heart']);
                return response()->json(data: ['liked' => "heart", 'notification'=>$new_notification], status: 201);
            }


        }

    }
}
