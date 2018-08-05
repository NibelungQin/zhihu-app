<?php
/**
 * Created by PhpStorm.
 * User: Nibelung Qin
 * Date: 2018/5/26
 * Time: 15:19
 */

namespace App\Repositories;


use App\Message;

class MessageRepository
{
    public function create(array $attribute)
    {
        return Message::create($attribute);
    }
}