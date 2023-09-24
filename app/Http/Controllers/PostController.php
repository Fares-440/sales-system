<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Notifications\CreatePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with([
            'posts' => Post::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        $users = User::where('id', '!=', auth()->user()->id)->get();

        Notification::send($users, new CreatePost($post->id, $post->name, auth()->user()->name));


        toastr()->success('تم اضافة البيانات بنجاح');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $notification_id = DB::table('notifications')
            ->where('data->post_id', $post->id)
            ->where('notifiable_id', auth()->user()->id)
            ->pluck('id');
        DB::table('notifications')
            ->where('id', $notification_id)
            ->update(['read_at' => now()]);
        return view('posts.show', compact('post'));
    }


    public function readAll()
    {

        $user = User::find(auth()->user()->id);

        foreach ($user->unreadNotifications as $notification) {
            $notification->delete();
            // $notification->markAsRead();
        }

        toastr()->success('تم قراءة كل التعليقات ');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
