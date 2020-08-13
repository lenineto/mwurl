<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * App\Url
 *
 * @property int $id
 * @property string $external
 * @property string $token
 * @property int $user_id
 * @property bool $enabled
 * @property mixed owner
 * @method static where(string $string, bool $true)
 * @method static create(array $array)
 */

class Url extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id', 'external', 'token', 'enabled'
    ];

    /**
     * Set updated_at and created_at to be updated automatically on every call
     * @var bool
     */
    public $timestamps = true;
    /**
     * @var mixed
     */

    /**
     * Implements the search() method for the URL model
     * @param string $query
     * @param string $keyword
     * @return Url|null
     * @noinspection PhpUndefinedMethodInspection
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->where('token', 'LIKE', '%'.$keyword.'%')->orwhere('external', 'LIKE', '%'.$keyword.'%');
    }

    /**
     * Enable Url
     * @return Url
     */
    public function disable()
    {
        $this->enabled = false;
        $this->save();
        return $this;
    }

    /**
     * Disable Url
     * @return Url
     */
    public function enable()
    {
        $this->enabled = true;
        $this->save();
        return $this;
    }

    /**
     * Fetch the URL owner
     * @return BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Determine if the current user is the URL owner
     * @return bool
     */
    public function isOwner()
    {
        return Auth::user() == $this->owner;
    }

}
