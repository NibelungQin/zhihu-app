<?php
/**
 * Created by PhpStorm.
 * User: Nibelung Qin
 * Date: 2018/5/23
 * Time: 21:12
 */

namespace App\Mailer;


use Illuminate\Support\Facades\Mail;
use Naux\Mail\SendCloudTemplate;

class Mailer
{
    public function sendTo($template,$email,array $data)
    {
        $content = new SendCloudTemplate($template, $data);

        Mail::raw($content, function ($message) use ($email) {
            $message->from('NibelungQin@outlook.com', 'NibelungQin');

            $message->to($email);
        });
    }
}