<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Url
 *
 * @property int $id
 * @property string $long_url
 * @property string $url_token
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $enabled
 * @method static Builder|Url newModelQuery()
 * @method static Builder|Url newQuery()
 * @method static Builder|Url query()
 * @method static Builder|Url search($keyword)
 * @method static Builder|Url whereCreatedAt($value)
 * @method static Builder|Url whereEnabled($value)
 * @method static Builder|Url whereId($value)
 * @method static Builder|Url whereLongUrl($value)
 * @method static Builder|Url whereUpdatedAt($value)
 * @method static Builder|Url whereUrlToken($value)
 * @method static Builder|Url whereUserId($value)
 * @mixin \Eloquent
 */
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
