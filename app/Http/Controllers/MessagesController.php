<?php

namespace App\Http\Controllers;

use App\Repositories\MessageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    protected $messageRepository;

    /**
     * MessagesController constructor.
     * @param $messageRepository
     */
    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function store()
    {
        $data=[
            'to_user_id'=>\request('user'),
            'from_user_id'=>user('api')->id,
            'body'=>\request('body'),
            'dialog_id'=>time().Auth::id(),
        ];
        $message=$this->messageRepository->create($data);
        if ($message){
            return response()->json(['status'=>true]);
        }
        return response()->json(['status'=>false]);
    }

}
