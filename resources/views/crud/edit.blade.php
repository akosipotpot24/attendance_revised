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
                            <select name="school_role" class="form-select form-select-sm">
                                <option value="" disabled selected>Select role</option>
                                <option value="faculty"      {{ $student->school_role == 'faculty'      ? 'selected' : '' }}>Faculty</option>
                                <option value="student"      {{ $student->school_role == 'student'      ? 'selected' : '' }}>Student</option>
                                <option value="non-teaching" {{ $student->school_role == 'non-teaching' ? 'selected' : '' }}>Non-Teaching</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Library Branch</label>
                            <select name="library_branch" class="form-select form-select-sm">
                                <option value="" disabled selected>Select branch</option>
                                <option value="pslrc" {{ $student->library_branch == 'pslrc' ? 'selected' : '' }}>Pre-School</option>
                                <option value="gslrc" {{ $student->library_branch == 'gslrc' ? 'selected' : '' }}>Grade School</option>
                                <option value="hslrc" {{ $student->library_branch == 'hslrc' ? 'selected' : '' }}>High School</option>
                                <option value="cllrc" {{ $student->library_branch == 'cllrc' ? 'selected' : '' }}>College</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Section</label>
                            <select name="section" class="form-select form-select-sm">
                                @foreach($sections as $section)
                                <option value="{{ $section->grade_level_code }} - {{ $section->section }}"
                                    {{ $student->section == $section->grade_level_code . ' - ' . $section->section ? 'selected' : '' }}>
                                    {{ $section->grade_level_code }} - {{ $section->section }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">ID Number</label>
                            <input type="text" class="form-control form-control-sm" name="student_number" value="{{ $student->student_number }}">
                        </div>


                         <div class="col-md-6">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Change Avatar</label>
                            <input type="file" name="avatar" class="form-control form-control-sm">
                        </div>
                    </div>

                    {{-- Avatar Upload --}}
                    <div class="row g-3 mb-4">
                        
                    </div>

                    {{-- Divider --}}
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

</x-layout>