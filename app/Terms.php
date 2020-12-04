<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    protected $table = 'terms';
    protected $primaryKey = 'ID';

    // All fields in Terms table are mass assignable
    protected $guarded = [];

    public $timestamps = false;
}
