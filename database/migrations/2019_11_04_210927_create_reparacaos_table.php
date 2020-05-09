<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data');
            $table->string('obs')->nullable();
            $table->integer('veiculo_id')->nullable();
            $table->double('km')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparacaos');
    }
}
