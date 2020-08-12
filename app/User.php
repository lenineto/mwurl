<?php

namespace App;

use Barryvdh\Reflection\DocBlock\Type\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;

/**
 * App\User
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The table to store the users
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary_key for the users table
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Set updated_at and created_at to be updated automatically on every call
     * @var bool
     */
    public $timestamps = true;


    /**
     * Fetches all URLs belonging to the User
     * @return HasMany|Collection|Url[]
     */
    public function urls()
    {
        return $this->hasMany(Url::class)->orderBy('updated_at', 'desc');
    }
}
