<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Requests\PostReactionRequest;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::orderBy('id','desc')->get();

        return response()->json([
            'data' => PostResource::collection($posts),
            'status' => 200,
            'message'=> 'Success'
        ]);
    }
    
    public function toggleReaction(PostReactionRequest $request)
    {
        $post = Post::find($request->post_id);
        
        if(!$post) {
            return response()->json([
                'data' => null,
                'status' => 404,
                'message' => 'model not found'
            ]);
        }
        
        if($post->user_id == auth()->id()) {
            return response()->json([
                'data' => null,
                'status' => 500,
                'message' => 'You cannot like your post'
            ]);
        }
        
        $like = Like::where('post_id', $request->post_id)->where('user_id', auth()->id())->first();

        if($request->like) {
            if($like && $like->post_id == $request->post_id) {
                return response()->json([
                    'data' => null,
                    'status' => 500,
                    'message' => 'You already liked this post'
                ]);
            }

            Like::create([
                'post_id' => $request->post_id,
                'user_id' => auth()->id()
            ]);
            
            return response()->json([
                'data' => null,
                'status' => 200,
                'message' => 'You like this post successfully'
            ]);
        }elseif($like && $like->post_id == $request->post_id) {
            $like->delete();
        }

        return response()->json([
            'data' => null,
            'status' => 200,
            'message' => 'You unlike this post successfully'
        ]);
    }
}
