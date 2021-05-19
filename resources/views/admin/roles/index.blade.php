<x-admin.master>
    @section('content')

        @include('admin.partials.error')
        {{--  @include('admin.partials.message')  --}}

        <div class="row">
            <div class="col-sm-3">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Role</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('role.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Create Role</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th class="d-flex justify-content-center">Option</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th class="d-flex justify-content-center">Option</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->slug }}</td>
                                            <td class="d-flex justify-content-center">
                                                <form method="post" action="{{ route('role.destroy', $role->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                                <a class="btn btn-primary" href="{{ route('role.edit', $role->id) }}">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection



</x-admin.master>
