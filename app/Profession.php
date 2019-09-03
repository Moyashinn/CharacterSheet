<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class profession extends Model
{
    #fillable設定
    protected $fillable = ['profession_id', 'profession'];
}
