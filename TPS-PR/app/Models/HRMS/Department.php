<?php

namespace App\Models\HRMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = 'DepartmentID';

    protected $fillable = [
        'DepartmentName',
        'Type',
        'Description',
    ];
    protected $dates = ['deleted_at']; 
    
    // Relationship with Employee
    public function employees()
    {
        return $this->hasMany(Employee::class, 'DepartmentID', 'DepartmentID');
    }

}
