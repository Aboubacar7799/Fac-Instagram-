<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Notification;
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
        //création de notification après le like d'un post
        if ($post->user_id !== auth()->id()) {
            Notification::create([
                'user_id' => $post->user_id,
                'from_user_id' => auth()->id(),
                'type' => 'like',
                'notifiable_id' => $post->id,
                'notifiable_type' => Post::class,
            ]);
        }

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
