<x-admin-master>
    @section('content')

        <h1>Edit a Video</h1>

        <form method="post" action="{{route('video.update', $video->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       id="title"
                       aria-describedby=""
                       placeholder="Enter title"
                       value="{{$video->title}}"

                >
            </div>
            <div class="form-group">
                <div><img height="100px" src="{{$video->Video}}" alt=""></div>
                <label for="file">File</label>
                <input type="file"
                       name="Video"
                       class="form-control-file"
                       id="">
            </div>


            <div class="form-group">
                         <textarea
                                 name="status"
                                 class="form-control"
                                 id="body"
                                 cols="30"
                                 rows="10"
                                 value="{{$video->status}}" >
                </textarea>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



    @endsection
</x-admin-master>
