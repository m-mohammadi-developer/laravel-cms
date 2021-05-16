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

        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <form action="{{ route('user.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4 d-flex justify-content-center">
                        <img width="50%" class="img-profile rounded-circle" src="{{ asset(auth()->user()->avatar) }}"
                            alt="avatar">
                    </div>
                    <div class="form-group">
                        <label for="name">Avatar</label>
                        <input type="file" name="avatar" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') {{ 'is-invalid' }} @enderror" placeholder="Enter your name"
                            value="{{ $user->name }}">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username"
                            class="form-control @error('username') {{ 'is-invalid' }} @enderror"
                            placeholder="Enter your username" value="{{ $user->username }}">

                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') {{ 'is-invalid' }} @enderror"
                            placeholder="Enter your email" value="{{ $user->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control  @error('password') {{ 'is-invalid' }} @enderror"
                            placeholder="Enter your password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="Enter your password again">

                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Save</button>



                </form>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-10 offset-sm-1">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>
                                            <input type="checkbox" @if ($user->userHasRole($role->name)) {{ 'checked' }} @endif name="" />
                                        </td>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->slug }}</td>
                                        <td>
                                            <form action="{{ route('user.user.attach', $user) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="role" value="{{ $role->id }}">

                                                <button 
                                                type="submit" 
                                                class="btn btn-primary"
                                                @if($user->roles->contains($role))
                                                    disabled
                                                @endif
                                                
                                                >Attach</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('user.user.detach', $user) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="role" value="{{ $role->id }}">

                                                <button 
                                                type="submit" 
                                                class="btn btn-danger"
                                                @if(!$user->roles->contains($role))
                                                    disabled
                                                @endif
                                                >Detach</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endsection
</x-admin.master>
