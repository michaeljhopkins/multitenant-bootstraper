<?php

namespace Multistarter;

use HipsterJazzbo\Landlord\BelongsToTenant;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Multistarter\User
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
    use BelongsToTenant;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
