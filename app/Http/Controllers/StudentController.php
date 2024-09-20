<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'fullname' => 'required|string|max:100',
            'dob' => 'required|date',
            'gender' => 'required|in:M,F,O',
            'address' => 'required|string',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|email|unique:students,email',
            'present_qualification' => 'required|string|max:100',
            'father_name' => 'required|string|max:100',
            'mother_name' => 'required|string|max:100',
            'profession' => 'required|string|max:100',
            'parents_phone_number' => 'required|string|max:15',
            'enrollment_date' => 'required|date',

        ]);

        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\View\View
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\View\View
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:100',
            'dob' => 'required|date',
            'gender' => 'required|in:M,F,O',
            'address' => 'required|string',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|email|unique:students,email,' . $student->id, // Email must be unique, excluding the current student's email
            'present_qualification' => 'required|string|max:100',
            'father_name' => 'required|string|max:100',
            'mother_name' => 'required|string|max:100',
            'profession' => 'required|string|max:100',
            'parents_phone_number' => 'required|string|max:15',
            'enrollment_date' => 'required|date',
            // 'computer_course' => 'required|in:CFB,DCO,DGD,OP,WD,CH,P',
            // 'language_course' => 'required|in:KR,EN,JP,HE,TU',
            // 'course_level' => 'required|in:B,I,A',
        ]);

        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified student from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
