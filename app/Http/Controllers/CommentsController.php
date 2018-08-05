<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Repositories\AnswerRepository;
use App\Repositories\CommentRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    protected $commentRepository;
    protected $questionRepository;
    protected $answerRepository;

    /**
     * CommentsController constructor.
     * @param $commentRepository
     */
    public function __construct(CommentRepository $commentRepository,QuestionRepository $questionRepository,AnswerRepository $answerRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->questionRepository=$questionRepository;
        $this->answerRepository=$answerRepository;
    }

    public function question($id)
    {
        return $this->questionRepository->getQuestionCommentsById($id);
    }

    public function answer($id)
    {
        return $this->answerRepository->getAnswerCommentsById($id);
    }

    public function store()
    {
        $model=$this->getModelNameFromType(\request('type'));
        $data=[
            'commentable_id'=>\request('model'),
            'commentable_type'=>$model,
            'user_id'=>user('api')->id,
            'body'=>\request('body'),
        ];
        $comment=$this->commentRepository->create($data);
        return $comment;
    }

    public function getModelNameFromType($type)
    {
        return $type==='question' ? 'App\Question' : 'App\Answer';
    }
}
