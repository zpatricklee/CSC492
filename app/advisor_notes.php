<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class advisor_notes extends Model
{
    protected $table = 'advisor_notes';
    protected $primaryKey = 'NOTE_ID';

    // All fields in VerifiedStudent table are mass assignable
    protected $guarded = [];

    //public $timestamps = false; 
    const CREATED_AT = 'CREATED';
    //const UPDATED_AT = 'UPDATED';
}