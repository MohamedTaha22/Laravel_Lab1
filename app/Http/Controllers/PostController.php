<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Jobs\DeletePosts;
use FFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::all();
        $posts = Post::paginate(8);
        // $postJobs = new DeletePosts();
        // $this->dispatch($postJobs);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $allUsers = User::all();

        return view('posts.create', [
            'allUsers' => $allUsers
        ]);
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        $comments = Comment::where('commentable_type', 'App\Models\Post')->where('commentable_id', $postId)->get();
        return view('posts.show', ['post' => $post ,"comments"=> $comments]);
        ;
    }

    public function store(StorePostRequest $request)
    {
        $data = request()->all();
        $post = new Post();
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->user_id = $data['post_creator'];
        if ($data['image']) {
            $image = $data['image']->getClientOriginalName();
            $post->image = $data['image']->storeAs("images", $image,"public");
        }
        $post->save();
        return redirect('/posts');
    }
    public function edit($postId)
    {
        $post = Post::find($postId);
        $allUsers = User::all();
        return view('posts.edit', ['post' => $post,'users'=> $allUsers]);
        ;
    }
    public function update($postId, UpdatePostRequest $request)
    {
        $data = request()->all();

        $updatedPost=Post::find($postId);
        $updatedPost->title=$data['title'];
        $updatedPost->description=$data['description'];
        $updatedPost->user_id=$data['post_creator'];

        $updatedPost->save();
        return redirect('posts');
    }
    public function destroy($postId)
    {
        $deletedPost=Post::find($postId);
        $path = $deletedPost->image;

        File::delete("storage/".$path);
        $deletedPost->delete();
        
        return redirect('posts');
    }
}
