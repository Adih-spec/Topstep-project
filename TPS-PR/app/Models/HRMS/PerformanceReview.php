<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerformanceReview extends Model
{
    protected $table = 'performance_reviews';
    protected $primaryKey = 'ReviewID';

    protected $fillable = [
        'EmployeeID',
        'CycleName',
        'ReviewDate',
        'ReviewerID',
        'OverallScore',
        'Summary',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmployeeID', 'EmployeeID');
    }

    public function reviewer()
    {
        return $this->belongsTo(Employee::class, 'ReviewerID', 'EmployeeID');
    }
}
