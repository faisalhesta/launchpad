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

   public function teacher()
   {
    return $this->hasOne(User::class,'id','assigned_teacher');
   }
//    public function getAssignedTeacherAttribute()
//    {
//        if($this->teacher){
//             return $this->teacher->name;
//        }
//        else{
//            return null;
//        }
//    }
}
