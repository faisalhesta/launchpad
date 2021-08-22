<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_type',
        'email',
        'password',
    ];

    protected $appends = ['user_role','is_admin'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teacher()
    {
       return $this->hasOne(Teacher::class,'user_id','id');
    }

    public function student()
    {
        return $this->hasOne(Student::class,'user_id','id');
    }

    public function getUserRoleAttribute()
    {
        if($this->user_type=='1'){
            return 'Teacher';
        }
        elseif($this->user_type=='2'){
            return 'Student';
        }
        else{
            return 'Admin';
        }
    }

    public function getIsAdminAttribute()
    {
        if($this->user_type=='0'){
            return true;
        }
        else{
            return false;
        }
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
