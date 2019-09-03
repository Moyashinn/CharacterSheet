<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class intial_data extends Model
{
  #念のために、ここで一回ＤＢに入っているデータを削除する
  #採番も削除
  User::truncate();

  

}
