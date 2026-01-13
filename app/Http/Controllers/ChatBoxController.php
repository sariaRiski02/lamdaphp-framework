<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Lamda\Core\Http\Controller;
use Lamda\Core\Http\Request;
use Lamda\Core\Http\Response;

class ChatBoxController extends Controller
{
    public function kontak(){
        return $this->view('kontak');
    }

    public function chat($to){
        return $this->view('chat');
    }

    public function send($to){
        $request = Request::input();
        // file_put_contents(__DIR__ .'/debug.log', print_r($request['data'], true) . PHP_EOL, FILE_APPEND);

        $chat = Chat::get("
            SELECT * FROM chat WHERE (sender_id = 1 AND recipient_id = 2) OR (sender_id = 2 AND recipient_id = 1) ORDER BY order_id ASC
        ");

        $end = end($chat) === null ?  0 : end($chat)++;

        file_put_contents(__DIR__ .'/debug.log', print_r($chat, true) . PHP_EOL, FILE_APPEND);

        // Chat::create([
        //     'message' => $request['message'],
        //     'sender_id' => 2,
        //     'recipient_id' => 1,
        //     'order_id' => 1

        // ]);
        return Response::json([
            "data" => $request['data']
        ]);
    }
}