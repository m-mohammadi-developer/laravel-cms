<x-admin.master>
    @section('content')

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All the Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Avatar</th>
                                <th>Registrted Date</th>
                                <th>Profile Updated</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Avatar</th>
                                <th>Registrted Date</th>
                                <th>Profile Updated</th>
                                <th>Options</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <a href="{{ route('user.profile.show', $user->id) }}"
                                            title="User Profile">{{ $user->username }}</a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td class="d-flex justify-content-center">
                                        <img width="100px" src="{{ asset($user->avatar) }}" alt="">
                                    </td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                   
                </div>
            </div>
        </div>
        
        {{-- <div class="d-flex">
            <div class="mx-auto">{{ $posts->links() }}</div>
        </div> --}}

    @endsection


    @section('scripts')

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>


    @endsection
</x-admin.master>
