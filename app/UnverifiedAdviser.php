<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnverifiedAdviser extends Model
{
    protected $table = 'unverified_adviser';
    protected $primaryKey = 'ID';

    // All fields in UnverifiedAdviser table are mass assignable
    protected $guarded = [];

    public $timestamps = false;
    //const CREATED_AT = 'CREATED';
    //const UPDATED_AT = 'UPDATED';

    // Useful helper method to quickly return if this user's email address has been verified or not
    public function isVerified()
    {
        if ($this->EMAIL_VERIFIED == null || empty($this->EMAIL_VERIFIED)) {
            return false;
        } else {
            return true;
        }
    }
}