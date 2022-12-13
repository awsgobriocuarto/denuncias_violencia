<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('person_id')->unsigned()->nullable();
            $table->bigInteger('portal_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->tinyInteger('type_of_violence')->nullable();

            // relations
            $table->foreign('person_id')->references('id')->on('persons')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('portal_id')->references('id')->on('portals')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            // El usuario que crea el tramite
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('restrict')
            ->onUpdate('cascade');
               
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
        Schema::dropIfExists('complaints');
    }
}
