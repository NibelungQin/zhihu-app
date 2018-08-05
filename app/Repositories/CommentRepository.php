<?php
/**
 * Created by PhpStorm.
 * User: Nibelung Qin
 * Date: 2018/5/27
 * Time: 17:21
 */

namespace App\Repositories;


use App\Comment;

class CommentRepository
{
    public function create(array $attribute)
    {
        return Comment::create($attribute);
    }
}