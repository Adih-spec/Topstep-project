<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolSession extends Model
{
    //
    protected $table = 'school_sessions'; // Specify the table name if it doesn't follow Laravel's naming convention
    protected $primaryKey = 'sessionID'; // Specify the primary key if it's not 'id'
    public $timestamps = true; // Enable timestamps if your table has created_at and updated_at
    protected $fillable = [
        'school_session_title',
        'session_start_date',
        'session_end_date',
        'school_session_status',
    ];
}
