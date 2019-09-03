<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    #モデルの定義
protected $fillable = ['name', 'email', 'password',/*'activate',*/];
}
