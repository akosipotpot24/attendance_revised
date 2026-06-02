<x-layout>
<div class="container mt-4" style="max-width: 780px;">

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="mb-0 fw-500">Reset you password</h5>
                        
                    </div>
                    <a href="/viewStudents" class="btn btn-sm btn-light border">
                        ← Back
                    </a>
                </div>
{{-- 
                <form action="/register" method="POST">
                    @csrf --}}

                    {{-- Name Row --}}
                    <div class="row justify-content-center  g-3 mb-5">
                        <div class="col-md-4 mb-4">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Enter your Current Password</label>
                            <input type="text" class="form-control form-control-sm" name="middlename">
                        </div>
                    </div>

                     <div class="row justify-content-center  g-3 mb-3">
                         <div class="col-md-4">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Type your New Password</label>
                            <input type="text" class="form-control form-control-sm" name="firstname">
                        </div>
                     </div>
                     <div class="row justify-content-center  g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Confirm Password</label>
                            <input type="text" class="form-control form-control-sm" name="lastname">
                        </div>
                     </div>

                    

                    <hr style="border-color: #e8e8e6;">

                    {{-- Submit --}}
                    <div class="d-flex justify-content-end">
                        <a href="/viewStudents" class="btn btn-sm btn-light border me-2">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-dark">Submit</button>
                    </div>
{{-- 
                </form> --}}

            </div>
        </div>

    </div>

</x-layout>