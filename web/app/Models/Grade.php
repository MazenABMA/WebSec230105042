<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['course_code', 'course_name', 'credit_hours', 'grade', 'term'];

    // Grade to GPA conversion
    public function getGradePoint()
    {
        $grading = [
            'A' => 4.0, 'B+' => 3.5, 'B' => 3.0,
            'C+' => 2.5, 'C' => 2.0, 'D' => 1.0,
            'F' => 0.0
        ];

        return $grading[$this->grade] ?? 0.0;
    }
}
