<x-layout>

    <div class="container mt-4" style="max-width: 780px;">

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="mb-0 fw-500">{{ $student->firstname }}'s Profile</h5>
                        <small class="text-muted">Edit student information</small>
                    </div>
                    <a href="/viewStudents" class="btn btn-sm btn-light border">
                        ← Back
                    </a>
                </div>

                <form action="/crud/update/{{ $student->student_number }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Avatar --}}
                    <div class="text-center mb-4">
                        <img src="/storage/avatars/{{ $student->avatar ?? 'default.png' }}"
                             class="rounded-circle"
                             width="80" height="80"
                             style="object-fit:cover; border: 1px solid #e8e8e6;"
                             alt="Profile">
                    </div>

                    {{-- Name Row --}}
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">First Name</label>
                            <input type="text" class="form-control form-control-sm" name="firstname" value="{{ $student->firstname }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Middle Name</label>
                            <input type="text" class="form-control form-control-sm" name="middlename" value="{{ $student->middlename }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Last Name</label>
                            <input type="text" class="form-control form-control-sm" name="lastname" value="{{ $student->lastname }}">
                        </div>
                    </div>

                    {{-- Details Row --}}
                    <div class="row g-3 mb-3">
                        <div class="col-md-3">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">School Role</label>
                            <select id="school_role" name="school_role" class="form-select form-select-sm">
                                <option value="" disabled>Select role</option>
                                <option value="faculty"      {{ $student->school_role == 'faculty'      ? 'selected' : '' }}>Faculty</option>
                                <option value="student"      {{ $student->school_role == 'student'      ? 'selected' : '' }}>Student</option>
                                <option value="non-teaching" {{ $student->school_role == 'non-teaching' ? 'selected' : '' }}>Non-Teaching</option>
                            </select>
                        </div>
                      
                        <div class="col-md-3">
                            <label id="label-section" class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Section</label>
                            <select id="select-section" name="section" class="form-select form-select-sm">
                                {{-- Populated by JS on load --}}
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label id="label-id" class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">ID Number</label>
                            <input type="text" class="form-control form-control-sm" name="student_number" value="{{ $student->student_number }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Change Avatar</label>
                            <input type="file" name="avatar" class="form-control form-control-sm">
                        </div>
                    </div>

                    <hr style="border-color: #e8e8e6;">

                    {{-- Submit --}}
                    <div class="d-flex justify-content-end">
                        <a href="/viewStudents" class="btn btn-sm btn-light border me-2">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-dark">Save Changes</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <script>
        const allSections = @json($sectionsJson);

        const branchCodes = {
            pslrc: function(code) { return code === 'Kinder'; },
            gslrc: function(code) { return ['1','2','3','4','5','6'].includes(code); },
            hslrc: function(code) { return ['7','8','9','10','11','12'].includes(code); },
            cllrc: function(code) { return !['Kinder','1','2','3','4','5','6','7','8','9','10','11','12'].includes(code); },
        };

        const facultyOptions = [
            { value: 'pre-school-dept',         label: 'Pre-School Dept.' },
            { value: 'grade-school-dept',        label: 'Grade School Dept.' },
            { value: 'jhs-dept',                 label: 'Junior High School Dept.' },
            { value: 'shs-dept',                 label: 'Senior High School Dept.' },
            { value: 'college-of-engineering',   label: 'College of Engineering' },
            { value: 'college-of-business',      label: 'College of Business' },
            { value: 'college-of-nursing',       label: 'College of Nursing' },
            { value: 'college-of-education',     label: 'College of Education' },
            { value: 'college-of-arts-sciences', label: 'College of Arts & Sciences' },
            { value: 'college-of-law',           label: 'College of Law' },
            { value: 'graduate-school',          label: 'Graduate School' },
        ];

        const nonTeachingOptions = [
            { value: 'registrar',       label: 'Registrar' },
            { value: 'librarian',       label: 'Librarian' },
            { value: 'guidance',        label: 'Guidance Counselor' },
            { value: 'school-nurse',    label: 'School Nurse' },
            { value: 'cashier',         label: 'Cashier / Accounting Staff' },
            { value: 'it-support',      label: 'IT Support Specialist' },
            { value: 'maintenance',     label: 'Maintenance Staff' },
            { value: 'security',        label: 'Security Personnel' },
            { value: 'admin-assistant', label: 'Administrative Assistant' },
            { value: 'hr-officer',      label: 'Human Resources Officer' },
            { value: 'admissions',      label: 'Admissions Officer' },
            { value: 'canteen',         label: 'Canteen Staff' },
            { value: 'janitor',         label: 'Janitor / Custodian' },
            { value: 'driver',          label: 'Driver' },
        ];

        const currentRole    = '{{ $student->school_role }}';
        const currentBranch  = '{{ $student->library_branch }}';
        const currentSection = '{{ $student->section }}';

        function populateSection(role, branch, restoreValue) {
            var labelSection  = document.getElementById('label-section');
            var selectSection = document.getElementById('select-section');
            var labelId       = document.getElementById('label-id');

            var options     = [];
            var placeholder = 'Select section';

            if (role === 'faculty') {
                labelSection.textContent = 'Department';
                labelId.textContent      = 'Employee Number';
                options                  = facultyOptions;
                placeholder              = 'Select department';

            } else if (role === 'non-teaching') {
                labelSection.textContent = 'Position';
                labelId.textContent      = 'Employee Number';
                options                  = nonTeachingOptions;
                placeholder              = 'Select position';

            } else {
                labelSection.textContent = 'Section';
                labelId.textContent      = 'ID Number';
                var filter = branchCodes[branch];
                options    = filter ? allSections.filter(function(s) { return filter(s.grade_code); }) : allSections;
                placeholder = 'Select section';
            }

            var html = '<option value="" disabled>' + placeholder + '</option>';
            options.forEach(function(opt) {
                var selected = restoreValue === opt.value ? 'selected' : '';
                html += '<option value="' + opt.value + '" ' + selected + '>' + opt.label + '</option>';
            });
            selectSection.innerHTML = html;
        }

        // On page load: restore saved values
        populateSection(currentRole, currentBranch, currentSection);

        // On role change
        document.getElementById('school_role').addEventListener('change', function() {
            var branch = document.getElementById('library_branch').value;
            populateSection(this.value, branch, '');
        });

        // On branch change
        document.getElementById('library_branch').addEventListener('change', function() {
            var role = document.getElementById('school_role').value;
            populateSection(role, this.value, '');
        });
    </script>

</x-layout>