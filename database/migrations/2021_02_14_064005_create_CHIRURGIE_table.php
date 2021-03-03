<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCHIRURGIETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CHIRURGIE', function (Blueprint $table) {
            $table->integer('N°INTERVNTION', true);
            $table->dateTime('Date')->nullable()->index('CHIRURGIEDate');
            $table->integer('DNumeroMalade')->nullable()->index('DNumeroMalade');
            $table->string('DIAGNOSTIC', 50)->nullable();
            $table->string('INDICATION', 25)->nullable();
            $table->string('ICP', 50)->nullable();
            $table->float('PUISSANCE', 24, 0)->nullable();
            $table->string('Anesthesie', 50)->nullable();
            $table->string('Operateur', 50)->nullable();
            $table->text('PROTOCOL OPERATOIR')->nullable();
            $table->boolean('RUPTURE')->default(0);
            $table->boolean('OEDEME')->default(0);
            $table->boolean('HTO')->default(0);
            $table->boolean('KERATITE')->default(0);
            $table->boolean('UVEITE')->default(0);
            $table->boolean('RESTE DE MASSES')->default(0);
            $table->string('AUTRE', 50)->nullable();
            $table->string('EVOLUTION', 50)->nullable();
            $table->string('Champ1')->nullable();
            $table->string('Champ2')->nullable();
            $table->timestamp('upsize_ts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CHIRURGIE');
    }
}
