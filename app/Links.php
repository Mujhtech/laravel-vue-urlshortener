<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    //
    protected $fillable = ["orig_link", "short_link", "short_code"];
}
