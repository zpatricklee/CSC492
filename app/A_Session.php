<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class A_Session extends Authenticatable
{
    use Notifiable;

    protected $guard = 'adviser';

    protected $table = 'a_session';
    protected $primaryKey = 'SESSION_ID';

    const CREATED_AT = 'session_start';
    const UPDATED_AT = null;
}
