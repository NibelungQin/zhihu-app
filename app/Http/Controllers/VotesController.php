<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Repositories\AnswerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotesController extends Controller
{
    protected $answerRepository;

    /**
     * VotesController constructor.
     * @param $answerRepository
     */
    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function index($id)
    {
        $user=user('api');
        if ($user->hasVotefor($id)){
            return response()->json(['voted'=>true]);
        }
        return response()->json(['voted'=>false]);
    }

    public function vote()
    {
        $user=user('api');
        $answer=$this->answerRepository->byId(\request('answer'));
        $voted=$user->voteFor($answer->id);
        if (count($voted['attached'])>0){
            $answer->increment('votes_count');
            return response()->json(['voted'=>true]);
        }
        $answer->decrement('votes_count');
        return response()->json(['voted'=>false]);
    }
}
