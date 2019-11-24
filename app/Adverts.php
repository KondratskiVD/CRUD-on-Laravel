<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adverts extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description', 'image'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id')->select(array('id', 'name'));
    }
}
