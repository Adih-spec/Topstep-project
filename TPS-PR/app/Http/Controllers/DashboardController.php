<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\students;
// use App\Models\Course;
// use App\Models\Program;
// use App\Models\Enrollment;

class DashboardController extends Controller{
    public function index()
{
    $data['studentsCount'] = students::count();
    // $coursesCount = Course::count();
    // $programsCount = Program::count();
    // $enrollmentsCount = Enrollment::count();

    return view('components.student.dashboard', $data);
}

}

{
    return view('dashboard');
}



?>