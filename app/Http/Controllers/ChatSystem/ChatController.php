<?php

namespace App\Http\Controllers\ChatSystem;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use App\Models\request_chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Pusher\Pusher;

class ChatController extends Controller
{
    protected $pusher;


    public function __construct(){

        $this->pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            [
                'cluster' => config('broadcasting.connections.pusher.options.cluster'),
                'useTLS' => false,
            ]
        );
    }
    public function index(Request $request)
    {
        $all_messages = Messages::get_messages_between_two_users($request, $request->receiver_id, $request->sender_id);
        $all_result = $all_messages->orderBy('created_at', 'desc')
            ->get();
        if ($all_result->count()) {
            foreach ($all_result as $message) {
                $message->update(['seen' => 0]);
            }
        }
        return response()->json(["status" => true, "message" => $all_result], 200);
    }

    public function store(Request $request)
    {
        $all_message = new Messages();
        $all_message->sender_id = $request->current_user;
        $all_message->receiver_id  = $request->receiver_id;
        $all_message->content  = $request->message_content;

        if ($request->hasFile('documents')) {
            $image =  $request->file('documents');
            $documentName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/messages_docs', $documentName);
            $all_message->attachment = str_replace('public/', '', $imagePath);
            $all_message->attachment_type = 'docs';
        }
        if ($request->hasFile('pictures')) {
            $image =  $request->file('pictures');
            $documentName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/messages_images', $documentName);
            $all_message->attachment = str_replace('public/', '', $imagePath);
            $all_message->attachment_type = 'image';
        }
        $all_message->save();
        $updated_message = Messages::with(['sender', 'receiver'])->find($all_message->id);
        $this->pusher->trigger('chat-system.' . $request->receiver_id, 'chat_receiver', [
            'data' => $updated_message,
        ]);
        return response()->json(['status'=>true, "message"=>$updated_message], 201);

    }
}
