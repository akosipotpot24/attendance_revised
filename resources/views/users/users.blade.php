<x-layout>
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





<div class="flex-grow-1 p-4">
        <div class="container mt-3 position-relative" style="min-height: 400px;">
        
        <div class="card mb-4">
            
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Users</h4>
                <a href="/users/approval" class="btn btn-sm btn-light border">Pending Users</a>
            </div>
            <div class="card-body">
                
                <table id="approvals" class="table table-bordered table-striped table-hover align-middle">
                    
                    <thead class="table-dark">
                        <tr>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Email Address</th>
                          
                         
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td class="d-flex justify-content-between align-items-center">
                                <span>{{ $user->email }}</span>
                                <span> 
                                    @if($user->user_type == 1)
                                    
                                    <form action="{{route('makeAdmin', $user->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-outline-secondary">make admin</button>
                                    </form>

                                    @else
                                    <span class="badge rounded-pill bg-light text-success border" style="font-size: 11px;">
                                        admin
                                    </span>

                                    @endif
                                    
                                </span>
                            </td>       
                                             
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
         </div>
     </div>
</x-layout>