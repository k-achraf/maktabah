<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'number', 'matricule', 'date','type_id','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','type_id','role_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role' , 'role_id');
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }
        else{
            if($this->hasRole($roles)){
                return true;
            }
        }

        return false;
    }

    public function hasRole($role){
        if (strtolower($this->role->name) == strtolower($role)){
            return true;
        }
        return false;
    }

    public function is_admin(){
        if($this->role->id == 1){
            return true;
        }

        return false;
    }

    public function is_libririan(){
        if($this->role->id == 1 or $this->role->id == 2){
            return true;
        }

        return false;
    }

    public function adminlte_profile_url()
    {
        if($this->role->id == 1 or $this->id == 2){
            return 'admin/profile/'.$this->id.'/edit';
        }
        return '/account';
    }

    public function requests(){
        return $this->hasMany('App\BookRequest', 'user_id');
    }

    public function type(){
        return $this->belongsTo('App\Type', 'type_id');
    }
}
