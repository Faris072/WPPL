<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Repo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repo', function (Blueprint $table) {
            $table->id('id_repo');
            $table->unsignedBigInteger('id');//membuat kolom id yang siap dijadikan foreign key
            $table->foreign('id')->references('id')->on('user')->onDelete('cascade');//menjadikan id sebagai foreign key
            $table->string('nama_repo',50);
            $table->string('deskripsi',2000)->nullable();
            $table->bigInteger('saldo')->nullable();
            $table->string('mata_uang')->nullable();
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
        Schema::dropIfExists('repo');
    }
}
