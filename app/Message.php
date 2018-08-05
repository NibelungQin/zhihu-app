<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table='messages';

    protected $guarded=[];

    public function fromUser()
    {
        return $this->belongsTo(User::class,'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class,'to_user_id');
    }

    public function markAsRead()
    {
        if (is_null($this->read_at)){
            $this->forceFill(['has_read'=>'T','read_at'=>$this->freshTimestamp()])->save();
        }
    }

    public function newCollection(array $models=[])
    {
        return new MessageCollection($models);
    }

}
