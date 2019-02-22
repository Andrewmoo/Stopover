<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  protected $primaryKey = 'id';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     const ADMIN_TYPE = 'admin';
     const GUEST_TYPE = 'guest';
     const HOTEL_TYPE = 'hotel';

    public function isAdmin() { return $this->type === self::ADMIN_TYPE; }

    protected $fillable = [
        'name', 'username', 'email', 'password', 'type',
        'firstName', 'lastName', 'phone', 'address', 'county', 'eircode', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }

    public function hotel()
    {
      return $this->hasOne('App\Hotel');
    }

    public function guest()
    {
      return $this->hasOne('App\Guest');
    }

/**
* @param string|array $roles
*/
public function authorizeRoles($roles)
{
  if (is_array($roles)) {
      return $this->hasAnyRole($roles) ||
             abort(401, 'This action is unauthorized.');
  }
  return $this->hasRole($roles) ||
         abort(401, 'This action is unauthorized.');
}
/**
* Check multiple roles
* @param array $roles
*/
public function hasAnyRole($roles)
{
  return null !== $this->roles()->whereIn(‘name’, $roles)->first();
}
/**
* Check one role
* @param string $role
*/
public function hasRole($role)
{
  return null !== $this->roles()->where('type', $role)->first();
}
}
