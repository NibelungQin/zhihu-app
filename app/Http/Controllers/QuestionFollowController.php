<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionFollowController extends Controller
{
    protected $questionRepository;

    /**
     * QuestionFollowController constructor.
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->middleware('auth');
        $this->questionRepository=$questionRepository;
    }

    public function follow($question)
    {
        Auth::user()->followThis($question);
        return back();
    }

    public function follower(Request $request)
    {
        $user=user('api');
        $follow=$user->followed($request->get('question'));
        if ($follow){
            return response()->json(['followed'=>true]);
        }
        return response()->json(['followed'=>false]);
    }

    public function followThisQuestion(Request $request)
    {
        $user=user('api');
        $question=$this->questionRepository->byIdWithQuestion($request->get('question'));
        $followed=$user->followThis($question->id);
        if (count($followed['detached'])){
            $question->decrement('followers_count');
            return response()->json(['followed'=>false]);
        }
        $question->increment('followers_count');
        return response()->json(['followed'=>true]);
    }
}
