<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdviserNotes extends Model
{
    protected $table = 'adviser_notes';
    protected $primaryKey = 'ID';

    // All fields in CompletedCourses table are mass assignable
    protected $guarded = [];

    public $timestamps = false;
    //const CREATED_AT = 'CREATED';
    //const UPDATED_AT = 'UPDATED';
}
