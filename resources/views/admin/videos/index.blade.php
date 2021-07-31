<x-admin-master>
    @section('content')

        <h1>All Videos</h1>

        @if(session('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @elseif(session('video-created-message'))
            <div class="alert alert-success">{{session('video-created-message')}}</div>
        @elseif(session('video-updated-message'))
            <div class="alert alert-success">{{session('video-updated-message')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Video</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Video</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($videos as $video)


                            <tr>
                                <td>{{$video->id}}</td>
                                <td>{{$video->user->name}}</td>
                                <td><a href="{{route('video.edit', $video->id)}}">{{$video->title}}</a></td>

                                <td>
                                   {{-- <img  width="500px" src="{{asset('uploads/public/videos/products/'.$video->Video)}}" alt="">--}}
                                    <video width="320" height="240" controls>
                                        <source src="{{asset('uploads/public/videos/products/'.$video->Video)}}" type="video/mp4">
                                        <source src="{{asset('uploads/public/videos/products/'.$video->Video)}}" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>

                                </td>

                                <td>{{$video->status}}</td>
                                <td>{{$video->created_at->diffForHumans()}}</td>
                                <td>{{$video->updated_at->diffForHumans()}}</td>
                                <td><form method="post" action="{{route('video.destroy', $video->id)}}" enctype="multipart/form-data">
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
        <div class="d-flex">
            <div class="mx-auto">
                {{$videos->links()}}
            </div>
        </div>
    @endsection

    @section('scripts')
    <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        {{--            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>--}}
    @endsection

</x-admin-master>
