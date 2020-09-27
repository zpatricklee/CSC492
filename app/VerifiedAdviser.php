<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifiedAdviser extends Model
{
    protected $table = 'verified_adviser';
    protected $primaryKey = 'ADVISER_ID';

    // All fields in VerifiedAdviser table are mass assignable
    protected $guarded = [];

    const CREATED_AT = 'CREATED';
    const UPDATED_AT = 'UPDATED';
}
