<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = auth()->user()->videos()->paginate(5);
        return view('admin.videos.index', ['videos' => $videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Video::class);
        return view('admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->authorize('create',Video::class);
        $inputs = request()->validate([
            'title' => 'required|min:5|max:255',
            'Video' => 'required|file',
            'status' => 'required'
        ]);
        $inputs=request()->all();
        if ($request->hasFile('Video')) {
           $destination_path='public/videos/products';
           $video=$request->file('Video');
           $video_name=$video->getClientOriginalName();
           $path=$request->file('Video')->storeAs($destination_path,$video_name);
           $inputs['Video']=$video_name;
        }

        auth()->user()->videos()->create($inputs);
        Session()->flash('video-created-message', 'video is created');

        return redirect()->route('video.index');


    }

/*
    public function store(Request $request)
    {
        $this->authorize('create',Video::class);
        $pages = request()->validate([
            'title' => 'required|min:5|max:255',
            'Video' => 'required|file',
            'status' => 'required'
        ]);

//            $pages->title = $request->input('title');
//            $pages->status = $request->input('status');

        if ($request->hasfile('Video')) {
            $file = $request->file('Video');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('videos/', $filename);

            $pages['Video'] = $filename;
        } else {
            return $request;
            $pages->Video = '';
        }


        auth()->user()->videos()->create($pages);
        Session()->flash('video-created-message', 'video is created');

        return redirect()->route('video.index');
    }
*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit', ['video' => $video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Video $video)
    {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'Video' => 'file',
            'status' => 'required'

        ]);


        if (request('Video')) {
            $inputs['Video'] = request('Video')->store('videos');
            $video->Video = $inputs['Video'];
        }

        $video->title = $inputs['title'];
        $video->status = $inputs['status'];


        $this->authorize('update', $video);
        /*or
        $post->update();
        */



        $video->save();

        session()->flash('video-updated-message', 'video with title was updated ' . $inputs['title']);

        return redirect()->route('video.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video,Request $request)
    {
        $video->delete();
        Session()->flash('message', 'video is deleted');
        /*
        $request->session()->flash('message','post is deleted');
        //basically will do the same thing but should access session
        */
        $this->authorize('delete',$video);
        return back();
    }
}
