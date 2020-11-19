<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    protected $table = 'terms';
    protected $primaryKey = 'TERM_ID';

    // All fields in Terms table are mass assignable
    protected $guarded = [];

    public $timestamps = false;
}
