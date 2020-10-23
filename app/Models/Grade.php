<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['grade', 'class'];

    protected $appends = [
        'studentCount',
    ];

    /**
     * Get the students for the class.
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'grade_id', 'id')->select(array('id'));
    }

    public function getStudentCountAttribute()
    {
        return $this->students->count();
    }
}