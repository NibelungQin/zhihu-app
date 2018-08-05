<?php
/**
 * Created by PhpStorm.
 * User: Nibelung Qin
 * Date: 2018/5/13
 * Time: 9:40
 */

namespace App\Repositories;


use App\Question;
use App\Topic;

class QuestionRepository
{
    public function byIdWithTopicsAndAnswers($id)
    {
        return Question::where('id',$id)->with(['topics','answers'])->first();
    }

    public function byIdWithQuestion($id)
    {
        return Question::find($id);
    }

    public function getQuestionFeed()
    {
        return Question::published()->latest('created_at')->with('user')->get();
    }

    public function create(array $attribute)
    {
        return Question::create($attribute);
    }

    public function normalizeTopic(array $topics)
    {
        return collect($topics)->map(function ($topic){
            if (is_numeric($topic)){
                Topic::find($topic)->increment('questions_count');
                return (int)$topic;
            }
            $newTopic=Topic::create(['name'=>$topic,'questions_count'=>1]);
            return $newTopic->id;
        })->toArray();
    }

    public function getQuestionCommentsById($id)
    {
        $questions=Question::with('comments','comments.user')->where('id',$id)->first();
        return $questions->comments;
    }
}