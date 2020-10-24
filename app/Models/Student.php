<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Student;
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
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function marks()
    {
        return $this->hasMany(Student::class, 'stu_reg_no', 'reg_no');
    }

    /**
     * search students by reg no
     *
     * @param [mix] $query
     * @param integer $limit
     * @return Object
     */
    public static function searchStudents($query, $limit = 10)
    {
        return Student::select('id', 'reg_no')->where('reg_no', 'like', '%' . $query . '%')->limit($limit)->get();
    }
}