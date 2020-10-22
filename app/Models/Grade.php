<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['grade', 'class'];

    /**
     * Get the classes for the grade post.
     */
    public function classes()
    {
        return $this->hasMany('Grade');
    }
}