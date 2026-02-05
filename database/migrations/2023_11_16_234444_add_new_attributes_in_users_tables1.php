<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewAttributesInUsersTables1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //

            $table->integer('etat')->default(0);

            $table->string('activation_code',255)->nullable();

            $table->string('activation_token',255)->nullable();
        });
    }

    /**
     * Reverse the migrations. POUR ANNULER UNE MIGRATION ON a:------------ php artisan migrate:rollback
     *                         POUR LE STATUT DES MIGRATIONS: ------------- php artisan migrate:status
     *                         POUR SUPPRIMER TOUTES LES TABLES:----------- php artisan migrate:fresh
     *                         POUR SUPPIMER TOUTES LES DONNEES D'UNE TABLE: php artisan tinker, ok après Nom du
     *                                                                          model::truncate(), ok après exit
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //

        });
    }
}
