<x-layout>

    <div class="container mt-4" style="min-height: 400px;">

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="mb-0 fw-500">Sections</h5>
                        <small class="text-muted">Manage grade levels and sections</small>
                    </div>
                    <a href="/sections/create" class="btn btn-sm btn-dark">
                        + Add Section
                    </a>
                </div>

                <table id="table1" class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.06em;">
                            <th class="border-0 pb-2">Grade Level</th>
                            <th class="border-0 pb-2">Section</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                        <tr style="font-size: 14px;">
                            <td class="text-muted">{{ $section->grade_level_code }}</td>
                            <td class="d-flex justify-content-between align-items-center">
                                 <span>{{ $section->section }}</span>
                                    <div class="d-flex gap-2">
                                        {{-- <form action="{{route('UpdateSection', $section->id)}}" method="POST">
                                             @csrf
                                             @method('PUT')
                                             <button class="btn btn-sm btn-outline-primary">Update</button>
                                        </form> --}}
                                         <form action="{{route('RemoveSection', $section->id)}}" method="POST">
                                             @csrf
                                             @method('DELETE')
                                             <button class="btn btn-sm btn-outline-danger">Remove</button>
                                        </form>
                                    </div> 
                                    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</x-layout>