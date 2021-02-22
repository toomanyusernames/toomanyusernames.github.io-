<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    public function user1(){
        return $this->belongsTo('App\Models\User', 'user_id_1');
    }

    public function user2(){
        return $this->belongsTo('App\Models\User', 'user_id_2');
    }
}
