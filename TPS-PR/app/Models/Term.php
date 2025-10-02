<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $table = 'terms';      
    protected $primaryKey = 'termID'; 

    protected $fillable = [
        'term_title',
        'term_status',
    ];

  
}
