<x-layout>
 


      {{-- <div class="flex-grow-1 p-4"> --}}
        <div class="container mt-3 position-relative" style="min-height: 400px;">
            <div id="loader-wrapper">
                <div id="loader"></div>
            </div>
           <div class="card">
            <div class="card-body">
                <div class="card-header">
                <h1>SECTION <a href="/sections/create" class="btn btn-primary float-end"> Add</a></h1>
                  
                </div>
                 <table id="table1" class="table table-bordered table-striped table-hover align-middle" >
                <thead class="table-dark">
                    <tr>
                        <th>Grade Level</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sections as $section)
                    <tr>
                        <td>{{ $section->grade_level_code }}</td>
                        <td>{{ $section->section }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
           </div>

        </div>
    {{-- </div> --}}

</x-layout>