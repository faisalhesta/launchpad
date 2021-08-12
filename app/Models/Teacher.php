<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'address',
        'profile_picture',
        'current_school',
        'previous_school',
        'experience',
        'expertise_in_subject'
    ];
}
