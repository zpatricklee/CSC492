<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class S_Session extends Authenticatable
{
    use Notifiable;

    protected $guard = 'student';

    protected $table = 's_session';
    protected $primaryKey = 'SESSION_ID';

    const CREATED_AT = 'session_start';
    const UPDATED_AT = null;
}
