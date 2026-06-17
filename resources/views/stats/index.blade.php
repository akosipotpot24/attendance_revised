<x-layout>

<div class="container mt-4" style="max-width: 780px;">
  <div class="card border-0 shadow-sm rounded-3">
   <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="mb-0 fw-500">Library Visits</h5>
                        <small class="text-muted">Select Date and Time</small>
                    </div>
                    <a href="/welcome" class="btn btn-sm btn-light border">
                        ← Back
                    </a>
                </div>



        <form action="{{ route('check_statistics') }}" method="GET">
    
            <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">From:</label>
                <input type="date" class="form-control form-control-sm" name="from">
            </div>
            <div class="col-md-4">
                <label class="form-label text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:0.06em;">To:</label>
                <input type="date" class="form-control form-control-sm" name="to">
            </div>
        </div>
        <div class="d-flex justify-content-end">
                        
                        <button type="submit" class="btn btn-sm btn-dark">Submit</button>
        </div>
        </form>
</div>
</div>
</div>
</div>
</x-layout>