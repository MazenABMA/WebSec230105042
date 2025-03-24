<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {
        $terms = Grade::select('term')->distinct()->orderBy('term')->get();
        $grades = Grade::all()->groupBy('term');

        return view('grades.index', compact('grades', 'terms'));
    }

    public function create()
    {
        return view('grades.edit', ['grade' => new Grade()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_code' => 'required|string|max:10',
            'course_name' => 'required|string|max:255',
            'credit_hours' => 'required|integer|min:1',
            'grade' => 'required|string|max:2',
            'term' => 'required|integer|min:1'
        ]);

        Grade::create($validated);

        return redirect()->route('grades.index')->with('success', 'Grade added successfully!');
    }

    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $validated = $request->validate([
            'course_code' => 'required|string|max:10',
            'course_name' => 'required|string|max:255',
            'credit_hours' => 'required|integer|min:1',
            'grade' => 'required|string|max:2',
            'term' => 'required|integer|min:1'
        ]);

        $grade->update($validated);

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully!');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully!');
    }
}
