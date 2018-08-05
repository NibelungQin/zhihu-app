<?php
/**
 * Created by PhpStorm.
 * User: Nibelung Qin
 * Date: 2018/5/23
 * Time: 21:17
 */

namespace App\Mailer;


use App\User;
use Illuminate\Support\Facades\Auth;

class UserMailer extends Mailer
{
    public function followNotification($email)
    {
        $data = [
            'url' => 'http://zhihu.hd',
            'name'=>Auth::guard('api')->user()->name
        ];
        $template='zhihu_App_new_user_follow';
        $this->sendTo($template,$email,$data);
    }

    public function passwordReset($email,$token)
    {
        $data = ['url' =>url('password/reset',$token)];
        $template='zhihu_app_password_reset';
        $this->sendTo($template,$email,$data);
    }

    public function welcome(User $user)
    {
        $data = [
            'url' => route('email.verify',['token'=>$user->confirmation_token]),
            'name'=>$user->name
        ];
        $template ='zhihu_app_register';
        $this->sendTo($template,$user->email,$data);
    }
}