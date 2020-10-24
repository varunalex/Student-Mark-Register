<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'subject'];

    /**
     * search subjects by code
     *
     * @param [mix] $query
     * @param integer $limit
     * @return Object
     */
    public static function searchSubjects($query, $limit = 10)
    {
        return Subject::select('id', 'code')->where('code', 'like', '%' . $query . '%')->limit($limit)->get();
    }
}