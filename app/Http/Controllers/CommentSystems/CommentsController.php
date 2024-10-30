<?php

namespace App\Http\Controllers\CommentSystems;

use App\Http\Controllers\Controller;
use App\Models\NotificationCenter;
use App\Models\PromptGeneration;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CommentSystem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function get_all_comments(Request $request){
        $post_id  = $request->post_id;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }else{
            $user_id = '';
        }

        $retrive_comments = CommentSystem::get_main_comments($post_id,5, $user_id);


        if($retrive_comments->isEmpty()){
            return response()->json(data:['comments'=>$retrive_comments], status: 404);
        }else{
            return response()->json(data:['comments' => $retrive_comments], status: 200);
        }

    }

    public function child_all_comments(Request $request){

        $comment_id = $request->comment_id;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }else{
            $user_id = '';
        }

        $replies = CommentSystem::get_replies_for_comment($comment_id, $user_id);

        if($replies->isEmpty()){
            return response()->json(data:['replies'=>$replies], status: 404);
        }else{
            return response()->json(data:['replies' => $replies], status: 200);
        }
    }

    public function insert_comment(Request $request)
    {

        $user_id  = Auth()->user()->id;
        $post_id  = $request->post_id;
        $comment_id  = $request->comment_id;
        $comment_parent_id  = $request->comment_parent_id;
        $sub_parent_id  = $request->sub_parent_id;
        $message  = $request->comment;
        $comment_image  = $request->comment_image;
        $comment_document  = $request->comment_document;

        $post_data = PromptGeneration::where('id', $post_id)->first();
        $user_details = User::where('id',$user_id)->first();

        if (!$comment_id && !$comment_parent_id && !$sub_parent_id){

            $create_comment  = new CommentSystem();
            $create_comment->user_id = $user_id;
            $create_comment->post_id = $post_id;
            $create_comment->comment = $message;

            if ($request->hasFile('comment_document')) {
                $image =  $request->file('comment_document');
                $documentName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/comments_docs', $documentName);
                $create_comment->attachment = str_replace('public/', '', $imagePath);
                $create_comment->attachment_type = 'docs';
            }

            if ($request->hasFile('comment_image')) {
                $image =  $request->file('comment_image');
                $documentName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/comments_images', $documentName);
                $create_comment->attachment = str_replace('public/', '', $imagePath);
                $create_comment->attachment_type = 'image';
            }

            $create_comment->save();

            if($user_id != $post_data->user_id){
                $new_notification = new NotificationCenter();
                $new_notification->sender_id =$user_id;
                $new_notification->receiver_id = $post_data->user_id;
                $new_notification->message = $user_details->name." Has commented on your post.";
                $new_notification->status = 'send';
                $new_notification->post_id = $post_id;
                $new_notification->comment_id = $create_comment->id;
                $new_notification->save();
            }

            $get_comment = CommentSystem::get_specific_comment($create_comment->id, $user_id);


            return response()->json(data:['comments' => $get_comment], status: 200);

        }else if($comment_id && $comment_parent_id === 'null' && $sub_parent_id === 'null' ){

            $create_comment  = new CommentSystem();
            $create_comment->user_id = $user_id;
            $create_comment->post_id = $post_id;
            $create_comment->comment = $message;
            $create_comment->parent_id = $comment_id;

            if ($request->hasFile('comment_document')) {
                $image =  $request->file('comment_document');
                $documentName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/comments_docs', $documentName);
                $create_comment->attachment = str_replace('public/', '', $imagePath);
                $create_comment->attachment_type = 'docs';
            }

            if ($request->hasFile('comment_image')) {
                $image =  $request->file('comment_image');
                $documentName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/comments_images', $documentName);
                $create_comment->attachment = str_replace('public/', '', $imagePath);
                $create_comment->attachment_type = 'image';
            }

            $create_comment->save();

            $get_comment = CommentSystem::get_specif_reply_for_comment($create_comment->id, $user_id);

            if($user_id != $post_data->user_id){
                $new_notification = new NotificationCenter();
                $new_notification->sender_id =$user_id;
                $new_notification->receiver_id = $post_data->user_id;
                $new_notification->message = $user_details->name." Has commented on your post.";
                $new_notification->status = 'send';
                $new_notification->post_id = $post_id;
                $new_notification->comment_id = $create_comment->id;
                $new_notification->save();
            }
            return response()->json(data:['comments' => $get_comment], status: 200);

        }else if($comment_id && $comment_parent_id && $sub_parent_id){

            $create_comment  = new CommentSystem();
            $create_comment->user_id = $user_id;
            $create_comment->post_id = $post_id;
            $create_comment->comment = $message;
            $create_comment->parent_id = $comment_parent_id;
            $create_comment->sub_parent_id = $comment_id;

            if ($request->hasFile('comment_document')) {
                $image =  $request->file('comment_document');
                $documentName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/comments_docs', $documentName);
                $create_comment->attachment = str_replace('public/', '', $imagePath);
                $create_comment->attachment_type = 'docs';
            }

            if ($request->hasFile('comment_image')) {
                $image =  $request->file('comment_image');
                $documentName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/comments_images', $documentName);
                $create_comment->attachment = str_replace('public/', '', $imagePath);
                $create_comment->attachment_type = 'image';
            }

            $create_comment->save();
            $get_comment = CommentSystem::get_specif_reply_for_comment($create_comment->id, $user_id);

            if($user_id != $post_data->user_id){
                $new_notification = new NotificationCenter();
                $new_notification->sender_id =$user_id;
                $new_notification->receiver_id = $post_data->user_id;
                $new_notification->message = $user_details->name." Has commented on your post.";
                $new_notification->status = 'send';
                $new_notification->post_id = $post_id;
                $new_notification->comment_id = $create_comment->id;
                $new_notification->save();
            }

            return response()->json(data:['comments' => $get_comment], status: 200);
        }

        return response()->json(data:['comments' => 'Error Uploading'], status: 404);
    }
}
