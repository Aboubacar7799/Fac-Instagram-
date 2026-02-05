<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function ajax(Request $request){

        $like = Like::updateOrCreate(
            [
                'post_id' => $request->post_id,
                'user_id' => auth()->id(),
            ],
            [
                'type' => $request->type
            ]
        );

        $post = Post::findOrFail($request->post_id);

        return response()->json([
            'success' => true,
            'counts' =>['like' => 
                $like->post->likes()->where('type','like')->count(),
                'love' =>
                $like->post->likes()->where('type', 'love')->count(),
                'sad' =>
                $like->post->likes()->where('type', 'sad')->count(),
                'angry' =>
                $like->post->likes()->where('type', 'angry')->count(),
                'wow' =>
                $like->post->likes()->where('type', 'wow')->count(),
        ],
        'userReaction' => $like->type
        ]);
    }
}
