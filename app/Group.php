<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['group_name','user_id', 'balance'];
    public function ud()
       {
           return $this->belongsTo('App\User');
       }
}
