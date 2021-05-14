<x-admin.master>
    @section('content') 

    <h1>User Profile for : {{ $user->name }}</h1>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="{{ route('user.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4 d-flex justify-content-center">
                    <img width="50%" class="img-profile rounded-circle" src="{{ asset(auth()->user()->avatar) }}" alt="avatar">
                </div>
                <div class="form-group">   
                    <label for="name">Avatar</label>
                    <input 
                    type="file" 
                    name="avatar"
                    class="form-control-file">
                </div>

                <div class="form-group">   
                    <label for="name">Name</label>
                    <input 
                    type="text" 
                    name="name"
                    id="name" 
                    class="form-control @error('name') {{ 'is-invalid' }} @enderror" 
                    placeholder="Enter your name"
                    value="{{ $user->name }}">
                  
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">   
                    <label for="username">Username</label>
                    <input 
                    type="text" 
                    name="username"
                    id="username" 
                    class="form-control @error('username') {{ 'is-invalid' }} @enderror" 
                    placeholder="Enter your username"
                    value="{{ $user->username }}">

                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">   
                    <label for="email">Email</label>
                    <input 
                    type="email" 
                    name="email"
                    id="email" 
                    class="form-control @error('email') {{ 'is-invalid' }} @enderror" 
                    placeholder="Enter your email"
                    value="{{ $user->email }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">   
                    <label for="password">Password</label>
                    <input 
                    type="password" 
                    name="password"
                    id="password" 
                    class="form-control  @error('password') {{ 'is-invalid' }} @enderror" 
                    placeholder="Enter your password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">   
                    <label for="password-confirmation">Password Confirmation</label>
                    <input 
                    type="password" 
                    name="password_confirmation"
                    id="password_confirmation" 
                    class="form-control" 
                    placeholder="Enter your password again">
          
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

                

            </form>
        </div>
    </div>
    @endsection
</x-admin.master>