<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Img_user extends Model
{
    protected $table = 'img_users';
    protected $fillable = ['nombre', 'formato', 'user_id'];
    public function bicicleta()
    {
     return $this->belongsTo('App\User');
    }
}
