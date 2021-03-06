<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'COURSE_ID';

    // All fields in Course table are mass assignable
    protected $guarded = [];

    public $timestamps = false;
    //const CREATED_AT = 'CREATED';
    //const UPDATED_AT = 'UPDATED';
}
