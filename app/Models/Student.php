<?php

namespace App\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'l_name',
        'initials',
        'reg_no',
        'address',
        'dob',
        'gender',
        'guardian',
        'grade_id',
    ];

    /**
     * Get the grade associated to the student.
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}