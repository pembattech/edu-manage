<!-- resources/views/students/create.blade.php -->

<x-app-layout>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="p-4 max-w-5xl mx-auto">

        <div class="rounded-md border">
            <h1 class="bg-gray-100 w-full text-3xl p-2 mb-2">Add New Student</h1>

            <div class="p-2">
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf

                    <div class="py-2">
                        <label for="fullname">Full Name</label>
                        <input type="text" name="fullname" id="fullname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('fullname') }}" required>
                        @error('fullname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                        <div class="py-2">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" id="dob"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ old('dob') }}" required>
                            @error('dob')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="py-2">
                            <label for="marital_status">Marital Status</label>
                            <select name="marital_status" id="marital_status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="S" {{ old('marital_status') == 'S' ? 'selected' : '' }}>Single
                                </option>
                                <option value="M" {{ old('marital_status') == 'M' ? 'selected' : '' }}>Married
                                </option>
                                <option value="D" {{ old('marital_status') == 'D' ? 'selected' : '' }}>Divorced
                                </option>
                                <option value="W" {{ old('marital_status') == 'W' ? 'selected' : '' }}>Widowed
                                </option>
                            </select>
                            @error('marital_status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="py-2">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                                <option value="O" {{ old('gender') == 'O' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="py-2">
                        <label for="address">Address</label>
                        <textarea name="address" id="address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            rows="3" required>{{ old('address') }}</textarea>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                        <div class="py-2">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ old('contact_number') }}" required>
                            @error('contact_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="py-2">
                            <label for="present_qualification">Present Qualification</label>
                            <input type="text" name="present_qualification" id="present_qualification"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ old('present_qualification') }}" required>
                            @error('present_qualification')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="py-2">
                        <label for="father_name">Father's Name</label>
                        <input type="text" name="father_name" id="father_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('father_name') }}" required>
                        @error('father_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="mother_name">Mother's Name</label>
                        <input type="text" name="mother_name" id="mother_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('mother_name') }}" required>
                        @error('mother_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="profession">Profession</label>
                        <input type="text" name="profession" id="profession"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('profession') }}" required>
                        @error('profession')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="py-2">
                        <label for="parents_phone_number">Parents' Phone Number</label>
                        <input type="text" name="parents_phone_number" id="parents_phone_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('parents_phone_number') }}" required>
                        @error('parents_phone_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="py-2">
            <label for="computer_course">Computer Course</label>
            <select name="computer_course" id="computer_course" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="CFB" {{ old('computer_course') == 'CFB' ? 'selected' : '' }}>CFB</option>
                <option value="DCO" {{ old('computer_course') == 'DCO' ? 'selected' : '' }}>DCO</option>
                <option value="DGD" {{ old('computer_course') == 'DGD' ? 'selected' : '' }}>DGD</option>
                <option value="OP" {{ old('computer_course') == 'OP' ? 'selected' : '' }}>OP</option>
                <option value="WD" {{ old('computer_course') == 'WD' ? 'selected' : '' }}>WD</option>
                <option value="CH" {{ old('computer_course') == 'CH' ? 'selected' : '' }}>CH</option>
                <option value="P" {{ old('computer_course') == 'P' ? 'selected' : '' }}>P</option>
            </select>
            @error('computer_course')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="py-2">
            <label for="language_course">Language Course</label>
            <select name="language_course" id="language_course" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="KR" {{ old('language_course') == 'KR' ? 'selected' : '' }}>Korean</option>
                <option value="EN" {{ old('language_course') == 'EN' ? 'selected' : '' }}>English</option>
                <option value="JP" {{ old('language_course') == 'JP' ? 'selected' : '' }}>Japanese</option>
                <option value="HE" {{ old('language_course') == 'HE' ? 'selected' : '' }}>Hebrew</option>
                <option value="TU" {{ old('language_course') == 'TU' ? 'selected' : '' }}>Turkish</option>
            </select>
            @error('language_course')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="py-2">
            <label for="course_level">Course Level</label>
            <select name="course_level" id="course_level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="B" {{ old('course_level') == 'B' ? 'selected' : '' }}>Beginner</option>
                <option value="I" {{ old('course_level') == 'I' ? 'selected' : '' }}>Intermediate</option>
                <option value="A" {{ old('course_level') == 'A' ? 'selected' : '' }}>Advanced</option>
            </select>
            @error('course_level')

                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div> --}}


                    <div class="py-2">
                        <label for="enrollment_date">Enrollment Date</label>
                        <input type="date" name="enrollment_date" id="enrollment_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('enrollment_date') }}" required>
                        @error('enrollment_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    </div>

                    <div class="pt-2">

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
