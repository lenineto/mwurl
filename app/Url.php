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

    public function scopeSearch($query, $keyword)
    {
        return $query->where('url_token', 'LIKE', '%'.$keyword.'%')->orwhere('long_url', 'LIKE', '%'.$keyword.'%');
    }
}
