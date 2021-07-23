<x-admin-master>
    @section('content')

        <h1>Create</h1>

                <form method="post" action="{{route('video.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       id="title"
                                       aria-describedby=""
                                       placeholder="Enter title">
                        </div>
                        <div class="form-group mt-3" >
                                <label for="file">Select Video </label>
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
