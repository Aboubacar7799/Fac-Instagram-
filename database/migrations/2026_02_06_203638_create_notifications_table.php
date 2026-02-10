<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');//celui qui reçoit l'action
            $table->foreignId('from_user_id')->constrained('users')->cascadeOnDelete(); //celui qui a fait l'action
            $table->string('type');//type d'action, like, comment, follow
            $table->unsignedBigInteger('notifiable_id');//Cible (post ou user)
            $table->string('notifiable_type');
            $table->boolean('is_read')->default(false);            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
