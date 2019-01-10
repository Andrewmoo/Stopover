<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  protected $primaryKey = 'user_id';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     const ADMIN_TYPE = 'admin';
     const DEFAULT_TYPE = 'default';
     public function isAdmin()    {
       return $this->type === self::ADMIN_TYPE;
     }
     
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

    public function posts(){
      return $this->hasMany('App\Post');
    }

    public function roles()
    {
      return $this->belongsToMany(Role::class);
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
  return null !== $this->roles()->where(‘name’, $role)->first();
}
}
