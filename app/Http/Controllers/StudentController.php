<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

use Illuminate\Support\Facades\File;


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
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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


        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('assets/student_profile_pictures'), $imageName);
            $validatedData['profile_picture'] = $imageName;
        }

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
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Check if the folder exists, if not, create it
            $path = public_path('assets/student_profile_pictures');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('assets/student_profile_pictures'), $imageName);
            $validatedData['profile_picture'] = $imageName;
        }

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

    public function printStudentDetails(Student $student)
    {
        // Fetch the image from the public path
        $imagePath = public_path('assets/student_profile_pictures/' . $student->profile_picture);
        $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);
        $imageData = file_get_contents($imagePath);
        $base64Image = 'data:image/' . $imageType . ';base64,' . base64_encode($imageData);

        // Prepare the HTML content with the embedded base64 image and margin CSS
        $html = '
            <div style="margin: 0 0.5in;">
                <div>
                    <h1 style="background-color: #f3f4f6; width: 100%; font-size: 1.875rem; padding: 8px; margin-bottom: 16px; text-align: center;">
                        Student Details
                    </h1>

                    <div style="padding-left: 4px; padding-right: 4px;">
                        <!-- Profile Picture -->
                        <div style="width: 12rem; height: 8rem;">
                                <img style="width: 100%; height: auto;" 
                                    src="' . $base64Image . '" alt="Profile Picture">
                        </div>

                        <div>
                            <ul style="list-style: none; padding-left: 0;">
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Full Name:</strong> ' . $student->fullname . '</li>
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Date of Birth:</strong> ' . $student->dob . '</li>
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Gender:</strong> ' . ($student->gender == "M" ? "Male" : ($student->gender == "F" ? "Female" : "Other")) . '</li>
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Address:</strong> ' . $student->address . '</li>
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Contact Number:</strong> ' . $student->contact_number . '</li>
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Email:</strong> ' . $student->email . '</li>
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Present Qualification:</strong> ' . $student->present_qualification . '</li>
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Father\'s Name:</strong> ' . $student->father_name . '</li>
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Mother\'s Name:</strong> ' . $student->mother_name . '</li>
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Profession:</strong> ' . $student->profession . '</li>
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Parents\' Phone Number:</strong> ' . $student->parents_phone_number . '</li>
                                <li style="font-size: 18px;"><strong style="font-weight: 600; line-height: 3rem; color: black;">Enrollment Date:</strong> ' . $student->enrollment_date . '</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </0 0.5iv>';

        // Create PDF using dompdf
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $options->set('isRemoteEnabled', true); // Enable remote assets if necessary

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        // Set the paper size to A4 and define custom margins
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (inline in browser)
        $dompdf->stream('student_details.pdf', array('Attachment' => false)); // Set Attachment to true for download
    }
}
