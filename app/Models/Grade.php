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

    /**
     * return grades and classes
     *
     * @param [array] $query
     * @param integer $limit
     * @return Object
     */
    public static function searchGrades($query, $limit = 10)
    {
        return Grade::select('id', 'grade', 'class')->where('grade', 'like', '%' . $query[0] . '%')
            ->where('class', 'like', '%' . $query[1] . '%')->limit($limit)->get();
    }

    public static function getGradeId($query)
    {
        return Grade::select('id', 'grade', 'class')->where('grade', $query[0])
            ->where('class', $query[1])->first();
    }
}