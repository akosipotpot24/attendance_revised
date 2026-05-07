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
                            <select name="school_role" class="form-select form-select-sm">
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
                        <div class="col-md-3">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Section</label>
                            <select name="section" class="form-select form-select-sm">
                                @foreach($sections as $section)
                                <option value="{{ $section->grade_level_code }} - {{ $section->section }}">
                                    {{ $section->grade_level_code }} - {{ $section->section }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Student Number</label>
                            <input type="text" class="form-control form-control-sm" name="student_number">
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

</x-layout>