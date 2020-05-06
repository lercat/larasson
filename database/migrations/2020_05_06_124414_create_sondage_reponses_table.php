<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSondageReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sondage_reponses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sondage_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('reponse_id');
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
        Schema::dropIfExists('sondage_reponses');
    }
}
