<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    public $timestamps = false;
    // protected $guard = 'admin';
    protected $table = "tbl_customers";
    protected $fillable = [
        'customer_name',
        'customer_password',
        'customer_phone',
        'customer_email',
        'code',
        'code_time'
    ];
    protected $primaryKey = 'customer_id';

    public function roles()
    {
        return $this->hasMany('App\Models\Roles', 'id_roles');
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function hasAnyRoles($roles)
    {
        return null !==  $this->roles()->whereIn('name', $roles)->second();
    }
    public function hasRole($role)
    {
        return null !==  $this->roles()->where('name', $role)->second();
    }
    protected $hidden = [
        'password', 'remember_token',
    ];
}
