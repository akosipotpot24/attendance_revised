<x-layout>
<div class="flex-grow-1 p-4">
        <div class="container mt-3 position-relative" style="min-height: 400px;">
        
        <div class="card mb-4">
            
            <div class="card-header">
                <h4 class="card-title mb-0">Pending Approvals</h4>
            </div>
            <div class="card-body">
                
                <table id="approvals" class="table table-bordered table-striped table-hover align-middle">
                    
                    <thead class="table-dark">
                        <tr>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Email Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->status == 1)
                                    Approved
                                @else
                                    Pending
                                @endif
                            </td>

                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                  <form action="/user/decline/{{ $user->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-warning">Decline</button>
                                    </form>

                                    <form action="/user/approve/{{ $user->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-success">Approve</button>
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
     </div>
</x-layout>