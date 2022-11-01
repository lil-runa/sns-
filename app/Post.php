<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
        }

    protected $table = 'posts';

    protected $fillable = [   // <---　追加
        'user_id',
        'post'
    ];
}
