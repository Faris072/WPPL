<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembukuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembukuans', function (Blueprint $table) {
            $table->id('id_pembukuans');
            $table->bigInteger('id_repo');
            $table->date('tanggal');
            $table->string('uraian');
            $table->bigInteger('debit')->nullable();
            $table->bigInteger('kredit')->nullable();
            $table->bigInteger('saldo')->nullable();
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
        Schema::dropIfExists('pembukuans');
    }
}
