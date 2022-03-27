<?php

namespace App\Http\Controllers\posts;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function __construct(){
            $this->middleware("auth");

     }
public function showDeletedPosts()
{
    $id=Auth::user()->id;
    $allposts=Post::orderBy("id","asc")->onlyTrashed()->where('user_id',$id)->paginate(3);
    return view("posts.deletedposts",["posts"=>$allposts]);
 
}  
    public function index()
    {
        $allposts=Post::orderBy("id","asc")->paginate(3);
        return view("posts.index",["posts"=>$allposts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $allusers=User::all();
        return view("posts.CreatePost",["users"=>$allusers]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->only('title','body','user_id','image');
        $img_name=time().$request->image->getClientOriginalName();
        $path="storage/images/posts";
        $post = new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=Auth::user()->id;
        $post->image=$img_name;
        $request['image']->move($path,$img_name);
        $post->save();
        return to_route("posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

       
       return view("posts.ShowPost",["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($this->authorize("update",$post))
        {
            $users=User::all();
            return view("posts.EditPost",["post"=>$post,"users"=>$users]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($this->authorize("update",$post))
        {
            $request["user_id"]=Auth::user()->id;
            $post->update($request->all());
            return to_route("posts.index");
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($this->authorize("destroy",$post))
        {
            $post->delete();
            return to_route("posts.index");
        }
    }
    public function restorePost(Post $post)
    {
       $post->onlyTrashed()->restore();
       return to_route("posts.index");

    }
    public function getmyposts(){
        $authposts=Auth::user()->posts;
        return view("posts.myposts",["posts"=>$authposts]);
    }
}
