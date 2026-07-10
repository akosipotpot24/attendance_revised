<x-layout>



    <div class="container mt-4" style="max-width: 480px;">

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                {{-- Header --}}

                    @if (session()->has('success'))
                        <div class="alert-minimal alert-success-minimal">
                            {{ session('success') }}
                        </div>
                        @endif

                        {{-- Failed --}}
                        @if (session()->has('failed'))
                        <div class="alert-minimal alert-danger-minimal">
                            {{ session('failed') }}
                        </div>
                        @endif
                <div class="d-flex justify-content-between align-items-center mb-4">
                      
                    <div>
                        <h5 class="mb-0 fw-500">Create Section</h5>
                        <small class="text-muted">Add a new grade level and section</small>
                    </div>
                    <a href="/sections" class="btn btn-sm btn-light border">
                        ← Back
                    </a>
                </div>

                <form action="/sections" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Grade Level</label>
                        <select class="form-select form-select-sm" name="grade_level_code">
                            <option selected disabled>Choose grade level</option>
                            <option value="Kinder">Kinder</option>
                            <option value="1">Grade 1</option>
                            <option value="2">Grade 2</option>
                            <option value="3">Grade 3</option>
                            <option value="4">Grade 4</option>
                            <option value="5">Grade 5</option>
                            <option value="6">Grade 6</option>   
                            <option value="7">Grade 7</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                            <option value="10">Grade 10</option>
                            <option value="11">Grade 11</option>
                            <option value="12">Grade 12</option>
                            <option value="college">College</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Section Name</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="section"
                            placeholder="e.g. Rizal, Bonifacio">
                    </div>

                    <hr style="border-color: #e8e8e6;">

                    <div class="d-flex justify-content-end">
                        <a href="/sections" class="btn btn-sm btn-light border me-2">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-dark">Create Section</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</x-layout>