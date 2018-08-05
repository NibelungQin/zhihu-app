<?php
/**
 * Created by PhpStorm.
 * User: Nibelung Qin
 * Date: 2018/5/29
 * Time: 17:38
 */

namespace App;


use Illuminate\Database\Eloquent\Collection;

class MessageCollection extends Collection
{
    public function markAsRead()
    {
        $this->each(function ($message){
            if ($message->to_user_id === user()->id){
                $message->markAsRead();
            }
        });
    }
}