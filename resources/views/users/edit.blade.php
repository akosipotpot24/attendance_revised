<x-layout>

    <div class="container mt-4" style="max-width: 780px;">

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        
                        <small class="text-muted">Edit your information</small>
                    </div>
                    <a href="/viewStudents" class="btn btn-sm btn-light border">
                        ← Back
                    </a>
                </div>

                <form action="/users/update/{{ $users->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Avatar 
                    <div class="text-center mb-4">
                        <img src="/storage/avatars/{{ $student->avatar ?? 'default.png' }}"
                             class="rounded-circle"
                             width="80" height="80"
                             style="object-fit:cover; border: 1px solid #e8e8e6;"
                             alt="Profile">
                    </div>--}}

                    {{-- Name Row --}}
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Full Name</label>
                            <input type="text" class="form-control form-control-sm" name="firstname" value="{{ $users->fullname }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">Email Adress</label>
                            <input type="email" class="form-control form-control-sm" name="email" value="{{ $users->email }}">
                        </div>
                        
                    </div>

                    {{-- Details Row --}}
                    <div class="row g-3 mb-3">
                        <div class="col-md-3">
                            <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">User Type</label>
                            <input type="text" class="form-control form-control-sm" name="user_type" value="{{ $users->user_type }}">
                        </div>
                      
                        <div class="col-md-3">
                       
                       
                        
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


</x-layout>