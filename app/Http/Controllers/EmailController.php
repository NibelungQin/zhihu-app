<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function verify($token)
    {
        $user=User::where('confirmation_token',$token)->first();
        if (is_null($user)){
            flash('邮箱认证失败！','danger');
            return redirect('/');
        }
        $user->is_active=1;
        $user->confirmation_token=str_random(48);
        $user->save();
        flash('邮箱认证成功！')->success();
        return redirect('/home');
    }
}
