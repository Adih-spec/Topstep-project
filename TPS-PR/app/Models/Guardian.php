<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Authenticatable
{
    //
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'other_names',
        'phone',
        'email',
        'religion',
        'residential_address',
        'country',
        'state_of_origin',
        'city',
        'occupation',
        'photo',
        'password',
    ];
    protected $hidden = [
        'password',
    ];

    public function getAuthIdentifierName()
    {
        return 'email';
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'guardian_student');
    }    
}
