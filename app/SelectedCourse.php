<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectedCourse extends Model
{
    protected $table = 'selected_course';
    protected $primaryKey = 'SELECTED_COURSE_ID';

    // All fields in SelectedCourse table are mass assignable
    protected $guarded = [];

    public $timestamps = false;
    //const CREATED_AT = 'CREATED';
    //const UPDATED_AT = 'UPDATED';
}
