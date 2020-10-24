<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = ['subject_code', 'stu_reg_no', 'grade_id', 'marks', 'term'];

    public function students()
    {
        return $this->belongsTo(Student::class, 'reg_no', 'stu_reg_no');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'code', 'subject_code');
    }

    public function grades()
    {
        return $this->belongsTo(Grade::class, 'grade', 'grade_id');
    }
}