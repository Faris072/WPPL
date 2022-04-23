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
            $table->bigIncrements('id_pembukuans');
            $table->unsignedBigInteger('id_repo');
            $table->foreign('id_repo')->references('id_repo')->on('repo')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('uraian');
            $table->bigInteger('nominal')->nullable();
            $table->timestamp('last_used_at')->nullable();
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
