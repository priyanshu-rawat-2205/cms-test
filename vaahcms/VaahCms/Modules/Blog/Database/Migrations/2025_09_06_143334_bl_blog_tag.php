<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlBlogTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('bl_blog_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable()->index();

            $table->unsignedBigInteger('bl_blog_id')->nullable();
            $table->unsignedBigInteger('bl_tag_id')->nullable();

            //----common fields
            $table->text('meta')->nullable();
            $table->integer('created_by')->nullable()->index();
            $table->integer('updated_by')->nullable()->index();
            $table->integer('deleted_by')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['created_at', 'updated_at', 'deleted_at']);
            //----/common fields

        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('bl_blog_tag');
    }
}
