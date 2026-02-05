<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMessageRequest;
use App\Repository\ConversationRepository;

class ConversationController extends Controller
{

    private $conversationRepository;
    private $auth;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $auth)
    {
        $this->conversationRepository = $conversationRepository;
        $this->auth = $auth;
    }

    public function index(){
        //on lui demande de recuperer tous les users dont id est different de user connécté
        $me = $this->auth->user();
        return view('conversations.index', [
            'users' => $this->conversationRepository->getUserMessage($me->id),
            'unread' => $this->conversationRepository->unreadCount($me->id)
        ]);
    }

    public function show(User $user){

        $me = $this->auth->user(); //l'utilisateur connecter

        //on lui demande de recuperer tous les users dont id est different de user connécté
        $messages = $this->conversationRepository->getMessageFor($me->id, $user->id)->paginate(15);//recuperation de la conversation de deux users
        $unread = $this->conversationRepository->unreadCount($me->id);//recuperation des conversations non lus

        //marquer tous les messages comme lus si y'a des messages non lus
        if(isset($unread[$user->id])){
            $this->conversationRepository->readAllFrom($user->id, $me->id);
            unset($unread[$user->id]);//on remet le tout à zero
        }

        return view('conversations.show', [
            'users' => $this->conversationRepository->getUserMessage($me->id),//recuperation de users connecter à l'exception de user connecter
		    'user' => $user,//l'id de user à qui nous voulons envoyer le message
            'messages' => $messages,
            'unread' => $unread
        ]);
    }

    public function store(User $user, StoreMessageRequest $request){
        $me = $this->auth->user();
        $this->conversationRepository->createMessage(
            $request->get('content'),
            $me->id,
            $user->id
        );

        return redirect()->route('conversations.show', ['user' => $user->id]);
    }
}
