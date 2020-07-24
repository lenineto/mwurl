<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Url
 *
 * @property int $id
 * @property string $long_url
 * @property string $url_token
 * @property int $user_id
 * @property bool $enabled
 */

class Url extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'user_id', 'long_url', 'url_token', 'enabled'
    ];

    /**
     * Set updated_at and created_at to be updated automatically on every call
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Implements the search() method for the URL model
     *
     * @param string $query
     * @param string $keyword
     * @return Url|null
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->where('url_token', 'LIKE', '%'.$keyword.'%')->orwhere('long_url', 'LIKE', '%'.$keyword.'%');
    }
}
