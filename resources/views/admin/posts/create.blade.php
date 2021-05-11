<x-admin-master>
    @section('content')

        <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>   
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" />
            </div>

            <div class="form-group">
                <label for="file">Post Image</label>   
                <input type="file" name="post_image" id="post_image" class="form-control-file"/>
            </div>

            <div class="form-group">
                <label for="body">Post Body</label>   
                <textarea name="body" id="body" class="form-control" cols="30" rows="10" placeholder="Enter Post Description"></textarea>
            </div>
           
            <button type="submit" class="btn btn-block btn-primary">Submit</button>

        </form>

    @endsection
</x-admin-master>