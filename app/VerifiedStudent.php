<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifiedStudent extends Model
{
    protected $table = 'verified_student';
    protected $primaryKey = 'STUDENT_ID';

    // All fields in VerifiedStudent table are mass assignable
    protected $guarded = [];

    public $timestamps = false; 
    //const CREATED_AT = 'CREATED';
    //const UPDATED_AT = 'UPDATED';
}
