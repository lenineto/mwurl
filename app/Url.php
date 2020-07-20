<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = 'urls'; //redundant

    protected $primaryKey = 'id'; //redundant

    protected $fillable = [
      'long_url', 'url_token', 'enabled'
    ];

    public $timestamps = true;
}
