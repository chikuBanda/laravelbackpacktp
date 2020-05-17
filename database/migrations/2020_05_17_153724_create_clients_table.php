<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('numClient');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('email');
            $table->string('login');
            $table->string('motdepasse');
            $table->double('ca');
            $table->text('imgPath');
            $table->dateTime('date_inscr');
            $table->char('admin', 1)->default('n');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
