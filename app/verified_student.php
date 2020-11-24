<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class verified_student extends Model
{
    //table = "verified_student" primaryKey = "STUDENT_ID"
    protected $table = 'verified_student';
    protected $primaryKey = 'STUDENT_ID';

    // All fields in VerifiedAdviser table are mass assignable
    protected $guarded = [];

    const CREATED_AT = 'CREATED';
    const UPDATED_AT = 'UPDATED';
}
