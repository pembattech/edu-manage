<x-app-layout>
    <div class="p-4 max-w-5xl mx-auto">

        <div class="rounded-md border">
            <h1 class="bg-gray-100 w-full rounded-t-md text-3xl p-4 mb-2">Edit Student</h1>

            <div class="p-2">

                <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Profile Picture -->
                    <div class="py-2">
                        <div class="flex gap-2 ">
                            <div class="">

                                <label for="profile_picture">Profile Picture</label>
                                <input type="file" name="profile_picture" id="profile_picture"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    onchange="previewImage(event)">
                                @error('profile_picture')
                                    <div class="text-base text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="imagePreview"
                                class="mt-2 absolute top-32 right-2/4 {{ $student->profile_picture ? '' : 'hidden' }}">
                                <img src="{{ $student->profile_picture ? asset('assets/student_profile_pictures/' . $student->profile_picture) : '' }}"
                                    alt="Profile Picture" class="w-32 h-32 rounded-full object-cover mb-4">
                            </div>

                        </div>
                    </div>

                    <div class="py-2">
                        <label for="fullname">Full Name</label>
                        <input type="text" name="fullname" id="fullname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('fullname', $student->fullname) }}" required>
                        @error('fullname')
                            <div class="text-base text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('email', $student->email) }}" required>
                        @error('email')
                            <div class="text-base text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">

                        <div class="py-2">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" id="dob"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ old('dob', $student->dob) }}" required>
                            @error('dob')
                                <div class="text-base text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="py-2">
                            <label for="marital_status">Marital Status</label>
                            <select name="marital_status" id="marital_status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="single"
                                    {{ old('marital_status', $student->marital_status) == 'single' ? 'selected' : '' }}>
                                    Single
                                </option>
                                <option value="married"
                                    {{ old('marital_status', $student->marital_status) == 'married' ? 'selected' : '' }}>
                                    Married
                                </option>
                                <option value="divorced"
                                    {{ old('marital_status', $student->marital_status) == 'divorced' ? 'selected' : '' }}>
                                    Divorced</option>
                            </select>
                            @error('marital_status')
                                <div class="text-base text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="py-2">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="M" {{ old('gender', $student->gender) == 'M' ? 'selected' : '' }}>
                                    Male
                                </option>
                                <option value="F" {{ old('gender', $student->gender) == 'F' ? 'selected' : '' }}>
                                    Female
                                </option>
                                <option value="O" {{ old('gender', $student->gender) == 'O' ? 'selected' : '' }}>
                                    Other
                                </option>
                            </select>
                            @error('gender')
                                <div class="text-base text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="py-2">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('address', $student->address) }}" required>
                        @error('address')
                            <div class="text-base text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                        <div class="py-2">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ old('contact_number', $student->contact_number) }}" required>
                            @error('contact_number')
                                <div class="text-base text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="py-2">
                            <label for="present_qualification">Present Qualification</label>
                            <input type="text" name="present_qualification" id="present_qualification"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ old('present_qualification', $student->present_qualification) }}" required>
                            @error('present_qualification')
                                <div class="text-base text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="py-2">
                        <label for="father_name">Father's Name</label>
                        <input type="text" name="father_name" id="father_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('father_name', $student->father_name) }}" required>
                        @error('father_name')
                            <div class="text-base text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="mother_name">Mother's Name</label>
                        <input type="text" name="mother_name" id="mother_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('mother_name', $student->mother_name) }}" required>
                        @error('mother_name')
                            <div class="text-base text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="profession">Profession</label>
                        <input type="text" name="profession" id="profession"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('profession', $student->profession) }}" required>
                        @error('profession')
                            <div class="text-base text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                        <div class="py-2">
                            <label for="parents_phone_number">Parents' Phone Number</label>
                            <input type="text" name="parents_phone_number" id="parents_phone_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ old('parents_phone_number', $student->parents_phone_number) }}" required>
                            @error('parents_phone_number')
                                <div class="text-base text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="py-2">
                            <label for="enrollment_date">Enrollment Date</label>
                            <input type="date" name="enrollment_date" id="enrollment_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ old('enrollment_date', $student->enrollment_date) }}" required>
                            @error('enrollment_date')
                                <div class="text-base text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="py-2">
                        <p>Select Computer Course</p>
                        <ul
                            class="items-center w-full text-sm font-medium text-gray-900 bg-gray-50 border border-gray-200 rounded-lg sm:flex">
                            <!-- Computer Courses -->
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input id="programming-checkbox" type="checkbox" name="courses[]"
                                        value="programming-computer"
                                        class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500">
                                    <label for="programming-checkbox"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Programming</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input id="database-checkbox" type="checkbox" name="courses[]"
                                        value="database-computer"
                                        class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500">
                                    <label for="database-checkbox"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Database</label>
                                </div>
                            </li>

                        </ul>
                        @error('courses')
                            <!-- Change this to 'courses' -->
                            <div class="text-base text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="py-2">
                        <p>Select Language Class</p>
                        <ul
                            class="items-center w-full text-sm font-medium text-gray-900 bg-gray-50 border border-gray-200 rounded-lg sm:flex">

                            <!-- Language Courses -->
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input id="english-checkbox" type="checkbox" name="courses[]"
                                        value="english-language"
                                        class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500">
                                    <label for="english-checkbox"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900">English</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input id="japanese-checkbox" type="checkbox" name="courses[]"
                                        value="japanese-language"
                                        class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500">
                                    <label for="japanese-checkbox"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Japanese</label>
                                </div>
                            </li>
                            <li class="w-full">
                                <div class="flex items-center ps-3">
                                    <input id="korean-checkbox" type="checkbox" name="courses[]"
                                        value="korean-language"
                                        class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500">
                                    <label for="korean-checkbox"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Korean</label>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('imagePreview').style.display = 'block';
                document.getElementById('imagePreview').getElementsByTagName('img')[0].src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
