<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('bl_blogs')) {
            Schema::create('bl_blogs', function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();
                $table->uuid('uuid')->nullable()->index();

                $table->string('name')->nullable()->index();
                $table->string('slug')->nullable()->index();
                $table->text('description')->nullable();
                $table->text('excerpt')->nullable();
                $table->unsignedBigInteger('vh_taxonomy_status_id')->nullable();
                $table->unsignedBigInteger('bl_category_id')->nullable();
                $table->boolean('is_active')->nullable()->index();


                //----common fields
                $table->text('meta')->nullable();
                $table->bigInteger('created_by')->nullable()->index();
                $table->bigInteger('updated_by')->nullable()->index();
                $table->bigInteger('deleted_by')->nullable()->index();
                $table->timestamps();
                $table->softDeletes();
                $table->index(['created_at', 'updated_at', 'deleted_at']);
                //----/common fields

            });
        }

    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('bl_blogs');
    }
}
