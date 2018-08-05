<?php
/**
 * Created by PhpStorm.
 * User: Nibelung Qin
 * Date: 2018/5/28
 * Time: 16:38
 */

namespace App\Repositories;


use App\Topic;
use Illuminate\Http\Request;

class TopicRepository
{
    public function getTopicsForToggle(Request $request)
    {
        $topics=Topic::select(['id','name'])
            ->where('name','like','%'.$request->query('q').'%')
            ->get();
        return $topics;
    }
}