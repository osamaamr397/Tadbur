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
                <input type="radio" name="status" value="pictorial tafseer">
                <label>pictorial tafseer</label>
                <input type="radio" name="status" value="children learning"> <label>children learning</label>

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



    @endsection
</x-admin-master>
