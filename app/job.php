<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    protected $fillable = ['profession_id', 'job_id', 'job'];
}
