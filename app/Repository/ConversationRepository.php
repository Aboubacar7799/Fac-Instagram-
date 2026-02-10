<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class ConversationRepository
{

    private $user;
    private $message;

    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    //pour sélectionner tous les users à l’exception d’user connecter
    public function getUserMessage(int $userId)
    {
        $usersTo = DB::table('messages')
            ->join('users as user', 'to_id', '=', 'user.id')
            ->select('user.id', 'user.name')
            ->distinct()
            ->where('from_id', $userId);

        $usersFrom = DB::table('messages')
            ->join('users as user', 'from_id', '=', 'user.id')
            ->select('user.id', 'user.name')
            ->distinct()
            ->where('to_id', $userId);

            $userIds = $usersTo->union($usersFrom)->pluck('id');
            
            return User::whereIn('id', $userIds)->with('profil')->get();
        // $conversations = $usersTo->union($usersFrom)->get();
        // return $conversations;
    }

    //pour créer un nouveau message.
    public function createMessage(String $content, int $from, int $to)
    {
        return $this->message->newQuery()->create([
            'content' => $content,
            'from_id' => $from,
            'to_id' => $to,
            'created_at' => Carbon::now()
        ]);
    }

    //recuperation de la conversation de deux users
    public function getMessageFor(int $from, int $to): Builder
    {
        return $this->message->newQuery()
            ->whereRaw("((from_id = $from AND to_id = $to)) OR ((from_id = $to AND to_id = $from))")
            ->orderBy('created_at', 'DESC')
            ->with([
                'from' => function ($query) {
                    return $query->select('name', 'id');
                }
            ]); //recupère les conversation ou (from = from et to = to) oubien (from = to et to = from) avec les informations nom et id seulement
    }

    /**
     *récupère  le nombre de message non lus pour chaque conversation 
     * @param int $userId
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|Collection
     */
    public function unreadCount(int $userId)
    {
        return $this->message->newQuery()
            ->where('to_id', $userId)
            ->groupBy('from_id')
            ->selectRaw('from_id, CAST(COUNT(id) AS UNSIGNED) as count')
            ->whereRaw('read_at IS NULL')
            ->get()
            ->pluck('count', 'from_id');
    }

    //marquer tous les messages comme lus
    public function readAllFrom(int $from, int $to)
    {
        $this->message->where('from_id', $from)
            ->where('to_id', $to)
            ->whereNull('read_at')
            ->update(['read_at' => Carbon::now()]);
    }
}
