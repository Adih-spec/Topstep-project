<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name','guard_id'];

    // ✅ Rename to avoid clashing with Eloquent's guard() method
    public function guardRelation()
    {
        return $this->belongsTo(Guard::class, 'guard_id');
    }
}
