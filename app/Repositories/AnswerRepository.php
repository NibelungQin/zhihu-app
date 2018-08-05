<?php
/**
 * Created by PhpStorm.
 * User: Nibelung Qin
 * Date: 2018/5/14
 * Time: 19:34
 */

namespace App\Repositories;


use App\Answer;

class AnswerRepository
{
    public function create(array $attribute)
    {
        return Answer::create($attribute);
    }

    public function byId($id)
    {
        return Answer::find($id);
    }

    public function getAnswerCommentsById($id)
    {
        $answer = Answer::with('comments','comments.user')->where('id',$id)->first();
        return $answer->comments;
    }
}