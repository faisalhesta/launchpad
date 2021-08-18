<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'address',
        'profile_picture',
        'current_school',
        'previous_school',
        'parents_details',
        'assigned_teacher'
    ];

    protected $appends = ['image_url'];

   public function teacher()
   {
    return $this->hasOne(User::class,'id','assigned_teacher');
   }

   public function getImageUrlAttribute()
   {
       return asset('uploads/students').'/'.$this->profile_picture;
   }
}
