<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'guard_id'];

    public function authguard()
    {
        return $this->belongsTo(Guard::class);
    }
}
