<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Ramsey\Uuid\Uuid;

class PostsController extends Controller
{

    public function publicHomePage()
    {
        $config['posts'] = Posts::orderBy('created_at', 'desc')->paginate(10);

        return view('content',$config);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logUserId = Auth::id();
        $posts['posts'] = Posts::all()->where('user_id', $logUserId)->toArray();
        return view('admin.userPosts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postsCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')){
            $image = Input::file('image');
            $filename = time().'.'. $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $filename);
        }
        Posts::create([
            'id' => Uuid::uuid4(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
            'image' => $filename,
        ]);
        return redirect()->route('posts.show', $request->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::find($id);

        $data = ([
            'id' => $id,
            'post' => $post
        ]);


        return view('post', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        return view('admin.postsCreate', [ 'post'=>$post ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Posts::find($id);
        $data = request()->all();

        if ($request->hasFile('image')){
            $image = Input::file('image');
            $filename = time().'.'. $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $filename);
        }

        $post->update([
            'title' => $data['title'],
            'body' => $data['body'],
            'image' =>$filename,

        ]);
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);

        $post->delete();

        return redirect()->route('posts.index');
    }
}