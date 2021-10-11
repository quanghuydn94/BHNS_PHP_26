<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateEmployeeTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanviens', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('nhanvien_ten')->nullable();
            $table->string('nhanvien_cmnd', 15)->nullable();
            $table->string('nhanvien_sdt', 12)->nullable();
            $table->string('nhanvien_diachi')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->boolean('active');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('nhanviens');
    }
}
