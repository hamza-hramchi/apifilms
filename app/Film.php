<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'critics';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
