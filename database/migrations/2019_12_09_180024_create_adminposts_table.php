<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminposts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('decriptions');
            $table->string('post_image')->default('default.jpg');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();


            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adminposts');
    }
}
