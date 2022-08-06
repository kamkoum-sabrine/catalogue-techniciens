<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezVousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendez_vouses', function (Blueprint $table) {
           
                $table->id();
                $table->foreignId('client_id');
                $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->foreignId('prestataire_id');
                $table->foreign('prestataire_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->datetime('date_rdv');
                $table->integer('status');
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
        Schema::dropIfExists('rendez_vouses');
    }
}
