<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // afficher les notifications
    public function index(){
        $notifications = auth()->user()->notifications()->with('fromUser')->latest()->paginate(20);
        return view('notifications.index', compact('notifications'));
    }

    // cliquer sur une notification
    public function read($id){

        $notification = auth()->user()->notifications()->where('id',$id)->firstOrFail();

        abort_if($notification->user_id !== auth()->id(), 403);
        $notification->update(['is_read' => true]);

        //Marquer comme lue
        if(!$notification->is_read){
            $notification->update(['is_read' => true]);
        }
        
        // Like ou Commentaire -> redirection vers le post
        if($notification->type === 'like' || $notification->type === 'comment'){
            return redirect()->route('comments.store', $notification->notifiable_id);
        }

        if ($notification->type === 'follow'){
            return redirect()->route('app_profil', $notification->fromUser->profil->id);
        }
        
        return back();
    }
}
