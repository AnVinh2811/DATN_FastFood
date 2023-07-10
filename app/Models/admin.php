<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticatable
{
        use Notifiable;

       public $timestamps=false;
        // protected $guard = 'admin';
        protected $fillable=[
            'email','password','name','phone','status'
        ];
        protected $table='tbl_admin';
        protected $primaryKey='admin_id';
        public function roles(){
            return $this->belongsToMany('App\Models\Roles');
        }

        public function getAuthPassword(){
            return $this->password;
        }
        
        public function hasAnyRoles($roles){
            return null !==  $this->roles()->whereIn('name',$roles)->first();
        }
        public function hasRole($role){
            return null !==  $this->roles()->where('name',$role)->first();
            }
        protected $hidden = [
                'password', 'remember_token',
            ];
}
