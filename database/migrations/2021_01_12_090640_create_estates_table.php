<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->tinyInteger('floors_count');
            $table->tinyInteger('apartments_count');
            $table->tinyInteger('empty_apartments_count');
            $table->tinyInteger('rented_apartments_count');

            $table->integer('paid')->nullable();  // monthly
            $table->integer('unpaid')->nullable();  // monthly
            $table->integer('total_payments')->nullable();  // monthly

            $table->integer('exports')->nullable();  // monthly
            $table->integer('imports')->nullable();   // monthly
            $table->integer('gain_payments')->nullable();   // monthly

            $table->integer('slug');

            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('estates');
    }
}
