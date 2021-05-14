<x-admin.master>
    @section('content')

        <h1>Edit The Post</h1>

        <div class="d-flex justify-content-center">
            <img width="80%" class="img img-responsive" src="{{ $post->post_image }}" alt="">
        </div>

        <form method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Title</label>   
                <input 
                type="text" 
                name="title" 
                id="title" 
                class="form-control"
                value="{{ $post->title }}" 
                placeholder="Enter Title" />
            </div>

            <div class="form-group">
                
                <label for="file">Post Image</label>   
                <input 
                type="file" 
                name="post_image" 
                id="post_image" 
                class="form-control-file"/>
            </div>

            <div class="form-group">
                <label for="body">Post Body</label>   
                <textarea 
                name="body" 
                id="body" 
                class="form-control" 
                cols="30" 
                rows="10" 
                placeholder="Enter Post Description">{{ $post->body }}</textarea>
            </div>
           
            <button type="submit" class="btn btn-block btn-primary">Submit</button>

        </form>

    @endsection
</x-admin.master>