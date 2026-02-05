<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'content', 'from_id','to_id','read_at','created_at'
    ];

    protected $dates = ['created_at','read_at'];

    public $timestamps = false;

    //la relation entre Message et User
    public function from(){
        return $this->belongsTo(User::class,'from_id');//Un message est écrit par un seul user
    }
}
