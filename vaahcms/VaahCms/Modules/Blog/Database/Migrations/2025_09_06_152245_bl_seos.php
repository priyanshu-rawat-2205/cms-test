<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlSeos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('bl_seos', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable()->index();

            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_metatag')->nullable();

            $table->morphs('seoable');

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
        Schema::dropIfExists('bl_seos');
    }
}
