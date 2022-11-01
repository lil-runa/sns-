<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;


class Follow extends Model
{

public function followingIds(Int $user_id)
  {
      return $this->where('following_id', $user_id)->get();
  }

}
