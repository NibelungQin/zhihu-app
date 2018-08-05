<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Repositories\AnswerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    protected $answerRepository;

    /**
     * AnswersController constructor.
     * @param $answerRepository
     */
    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function store(StoreAnswerRequest $request,$question)
    {
        $data=[
            'user_id'=>Auth::id(),
            'question_id'=>$question,
            'body'=>$request->get('content')
        ];
        $answer=$this->answerRepository->create($data);
        $answer->question()->increment('answers_count');
        return back();
    }
}
