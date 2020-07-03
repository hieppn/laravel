<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olders', function (Blueprint $table) {
            $table->id();
            $table->integer('total')->default(0);
            $table->integer('discount')->default(0);
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->string('address');
             $table->longText("detail");
             $table->unsignedInteger("id_user");
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('status')->default('cho ship');
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
        Schema::dropIfExists('olders');
    }
}
