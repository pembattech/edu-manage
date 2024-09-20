<x-app-layout>
    <div class="p-4 max-w-5xl mx-auto">
        <div class="rounded-md">

            <h1 class="bg-gray-100 w-full text-3xl p-2 mb-2">Student Details</h1>

            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="w-80 px-4 py-2 border border-gray-300 text-left text-gray-700">Attribute</th>
                        <th class="px-4 py-2 border border-gray-300 text-left text-gray-700">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Full Name</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->fullname }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Date of Birth</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->dob }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Marital Status</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->marital_status }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Gender</td>
                        <td class="px-4 py-2 border border-gray-300">
                            @if ($student->gender == 'M')
                                Male
                            @elseif($student->gender == 'F')
                                Female
                            @else
                                Other
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Address</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->address }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Contact Number</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->contact_number }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Present Qualification</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->present_qualification }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Father's Name</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->father_name }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Mother's Name</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->mother_name }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Profession</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->profession }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Parents' Phone Number</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->parents_phone_number }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Computer Course</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->computer_course }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Language Course</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->language_course }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">Course Level</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $student->course_level }}</td>
                    </tr>
                </tbody>
            </table>

            <a href="{{ route('students.index') }}"
                class="mt-2 py-2.5 px-5 inline-block text-white font-semibold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-base focus:outline-none">Back
                to List</a>

        </div>
    </div>
</x-app-layout>
