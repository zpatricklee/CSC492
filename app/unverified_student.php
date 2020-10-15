<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unverified_student extends Model
{
    //table = "unverified_student" primaryKey = "ID"
    protected $table = 'unverified_student';
    protected $primaryKey = 'ID';

    // All fields in unverified_student table are mass assignable
    protected $guarded = [];

    const CREATED_AT = 'CREATED';
    const UPDATED_AT = 'UPDATED';

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
