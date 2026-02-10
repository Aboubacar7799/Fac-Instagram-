<?php

namespace App\Repository;

use App\Models\Notification;
use \Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class NotificationRepository
{

    /**
     *récupère  le nombre de message non lus pour chaque conversation 
     * @param int $userId
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|Collection
     */
    public function unreadCount(int $userId): int
    {
        return Notification::where('user_id', $userId)->where('is_read',false)->count();
        // Notification::where('user_id', auth()->id())->where('is_read', false)->count();
    }
}
