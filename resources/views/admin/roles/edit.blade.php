<x-admin.master>
    @section('content')
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Role</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('role.update', $role->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
</x-admin.master>
