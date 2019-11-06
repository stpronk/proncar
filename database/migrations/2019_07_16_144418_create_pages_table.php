<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('selector', 100);
            $table->string('name', 100);
            $table->string('title', 100);
            $table->string('route_url');
            $table->boolean('route_auth')->default(false);
            $table->string('route_controller');
            $table->boolean('nav_hidden')->default(true);
            $table->string('nav_name');
            $table->string('nav_class')->nullable();
            $table->integer('template_id')->default(1);
            $table->string('template_blade')->default('default');
            $table->string('type')->default('get');
            $table->uuid('uuid');
            $table->boolean('hidden')->default(true);

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
        Schema::dropIfExists('pages');
    }
}
