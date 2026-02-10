<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'from_user_id',
        'type',
        'notifiable_id',
        'notifiable_type',
        'is_read',
    ];

    //celui qui reçoit
    public function user(){
        return $this->belongsTo(User::class);
    }

    //celui qui agit
    public function fromUser(){
        return $this->belongsTo(User::class, 'from_user_id');
    }

    //Post ou User concerné
    public function notifiable(){
        return $this->morphTo();
    }
}
