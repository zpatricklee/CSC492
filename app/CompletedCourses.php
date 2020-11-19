<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompletedCourses extends Model
{
    protected $table = 'completed_courses';
    protected $primaryKey = 'COMPLETED_COURSES_ID';

    // All fields in CompletedCourses table are mass assignable
    protected $guarded = [];

    public $timestamps = false;
    //const CREATED_AT = 'CREATED';
    //const UPDATED_AT = 'UPDATED';
}
