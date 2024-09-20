<!-- resources/views/students/index.blade.php -->

<x-app-layout>

    @if (session('success'))
    <div id="toast-success" class="bg-gray-100 border text-black  fixed top-4 flex items-center w-full max-w-xs p-2 rounded-lg shadow transform -translate-x-full transition-transform duration-500 ease-in-out" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>

        <div class="ms-3 text-base font-normal">{{ session('success') }}</div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toastSuccess = document.getElementById('toast-success');
            toastSuccess.classList.remove('-translate-x-full');
            toastSuccess.classList.add('translate-x-0');

            // Slide out after 4 seconds
            setTimeout(() => {
                toastSuccess.classList.add('-translate-x-full');
            }, 4000);
        });
    </script>
@endif

    <div class="p-4 max-w-5xl mx-auto">

        <div class="border rounded-md">

            <h1 class="bg-gray-100 w-full text-3xl p-2 mb-4">Student List</h1>

            <div class="p-2">

                <a href="{{ route('students.create') }}"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-4">Add
                    New Student</a>

                <div class="mt-4">

                    <table class="" id="student-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Contact Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->fullname }}</td>
                                    <td>
                                        @if ($student->gender == 'M')
                                            Male
                                        @elseif($student->gender == 'F')
                                            Female
                                        @else
                                            Other
                                        @endif
                                    </td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->contact_number }}</td>

                                    <td>
                                        <a href="{{ route('students.show', $student) }}"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">View</a>
                                        <a href="{{ route('students.edit', $student) }}"
                                            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Edit</a>
                                        <form action="{{ route('students.destroy', $student) }}" method="POST"
                                            style="display:inline;" onsubmit="return confirmDelete()">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                                Delete
                                            </button>
                                        </form>

                                        <script>
                                            function confirmDelete() {
                                                return confirm('Are you sure you want to delete this student? This action cannot be undone.');
                                            }
                                        </script>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#student-table').DataTable();
        });
    </script>
</x-app-layout>
