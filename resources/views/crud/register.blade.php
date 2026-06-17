<x-layout>

    <div class="container mt-4" style="max-width: 780px;">

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="mb-0 fw-500">Register Student</h5>
                        <small class="text-muted">Fill in the student's information</small>
                    </div>
                    <a href="/viewStudents" class="btn btn-sm btn-light border">
                        ← Back
                    </a>
                </div>

                <form action="/register" method="POST">
                    @csrf

                    {{-- Name Row --}}

                     @if (session()->has('success'))
                    <div class="alert-minimal alert-success-minimal">
                        {{ session('success') }}
                    </div>
                    @endif

                    {{-- Failed --}}
                    @if (session()->has('error'))
                    <div class="alert-minimal alert-danger-minimal">
                        {{ session('error') }}
                    </div>
                    @endif


                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">First Name</label>
                            <input type="text" class="form-control form-control-sm" name="firstname">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Middle Name</label>
                            <input type="text" class="form-control form-control-sm" name="middlename">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Last Name</label>
                            <input type="text" class="form-control form-control-sm" name="lastname">
                        </div>
                    </div>

                    {{-- Details Row --}}
                    <div class="row g-3 mb-3">
                        <div class="col-md-3">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">School Role</label>
                            <select id="school_role" name="school_role" class="form-select form-select-sm">
                                <option value="" disabled selected>Select role</option>
                                <option value="faculty">Faculty</option>
                                <option value="student">Student</option>
                                <option value="non-teaching">Non-Teaching</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Library Branch</label>
                            <select name="library_branch" class="form-select form-select-sm">
                                <option value="" disabled selected>Select branch</option>
                                <option value="pslrc">Pre-School</option>
                                <option value="gslrc">Grade School</option>
                                <option value="hslrc">High School</option>
                                <option value="cllrc">College</option>
                            </select>
                        </div>
                        <div class="col-md-3" id="col-section">
                            <label id="label-section" class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Section</label>
                            <select id="select-section" name="section" class="form-select form-select-sm">
                                {{-- Default: student sections from DB --}}
                                @foreach($sections as $section)
                                <option value="{{ $section->grade_level_code }} - {{ $section->section }}">
                                    {{ $section->grade_level_code }} - {{ $section->section }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label id="label-id" class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Student Number</label>
                            <input type="text" id="input-id" class="form-control form-control-sm" name="id_number" placeholder="">
                        </div>
                    </div>

                    <hr style="border-color: #e8e8e6;">

                    {{-- Submit --}}
                    <div class="d-flex justify-content-end">
                        <a href="/viewStudents" class="btn btn-sm btn-light border me-2">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-dark">Register</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <script>
        const roleConfig = {
            student: {
                sectionLabel: 'Section',
                sectionOptions: null, // uses DB-seeded options (kept on page)
                idLabel: 'Student Number',
                idName: 'student_number',
                idPlaceholder: 'e.g. 2024-00123'
            },
            faculty: {
                sectionLabel: 'Department',
                sectionOptions: [
                    { value: 'pre-school-dept', label: 'Pre-School Dept.' },
                    { value: 'grade-school-dept', label: 'Grade School Dept.' },
                    { value: 'jhs-dept', label: 'Junior High School Dept.' },
                    { value: 'shs-dept', label: 'Senior High School Dept.' },
                    { value: 'college-of-engineering', label: 'College of Engineering' },
                    { value: 'college-of-business', label: 'College of Business' },
                    { value: 'college-of-nursing', label: 'College of Nursing' },
                    { value: 'college-of-education', label: 'College of Education' },
                    { value: 'college-of-arts-sciences', label: 'College of Arts & Sciences' },
                    { value: 'college-of-law', label: 'College of Law' },
                    { value: 'graduate-school', label: 'Graduate School' },
                ],
                idLabel: 'Employee Number',
                idName: 'employee_number',
                idPlaceholder: 'e.g. EMP-2019-004'
            },
            'non-teaching': {
                sectionLabel: 'Position',
                sectionOptions: [
                    { value: 'registrar', label: 'Registrar' },
                    { value: 'librarian', label: 'Librarian' },
                    { value: 'guidance-counselor', label: 'Guidance Counselor' },
                    { value: 'school-nurse', label: 'School Nurse' },
                    { value: 'cashier-accounting', label: 'Cashier / Accounting Staff' },
                    { value: 'it-support', label: 'IT Support Specialist' },
                    { value: 'maintenance', label: 'Maintenance Staff' },
                    { value: 'security', label: 'Security Personnel' },
                    { value: 'admin-assistant', label: 'Administrative Assistant' },
                    { value: 'hr-officer', label: 'Human Resources Officer' },
                    { value: 'admissions-officer', label: 'Admissions Officer' },
                    { value: 'canteen-staff', label: 'Canteen Staff' },
                    { value: 'janitor-custodian', label: 'Janitor / Custodian' },
                    { value: 'driver', label: 'Driver' },
                ],
                idLabel: 'Employee Number',
                idName: 'employee_number',
                idPlaceholder: 'e.g. EMP-2020-017'
            }
        };

        // Store the original DB-seeded section options
        const defaultSectionHTML = document.getElementById('select-section').innerHTML;

        document.getElementById('school_role').addEventListener('change', function () {
            const role = this.value;
            const cfg = roleConfig[role];
            if (!cfg) return;

            const labelSection = document.getElementById('label-section');
            const selectSection = document.getElementById('select-section');
            const labelId = document.getElementById('label-id');
            const inputId = document.getElementById('input-id');

            // Update section/position label
            labelSection.textContent = cfg.sectionLabel;

            // Update section/position options
            if (cfg.sectionOptions === null) {
                // Student: restore original DB options
                selectSection.innerHTML = defaultSectionHTML;
                selectSection.name = 'section';
            } else {
                let html = `<option value="" disabled selected>Select ${cfg.sectionLabel.toLowerCase()}</option>`;
                cfg.sectionOptions.forEach(opt => {
                    html += `<option value="${opt.value}">${opt.label}</option>`;
                });
                selectSection.innerHTML = html;
                
            }

            // Update ID field
            labelId.textContent = cfg.idLabel;
            
            inputId.placeholder = cfg.idPlaceholder;
        });
    </script>

</x-layout>