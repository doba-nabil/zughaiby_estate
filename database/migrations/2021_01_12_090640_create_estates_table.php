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

            $table->integer('paid');  // monthly
            $table->integer('unpaid');  // monthly
            $table->integer('total_payments');  // monthly

            $table->integer('exports');  // monthly
            $table->integer('imports');   // monthly
            $table->integer('gain_payments');   // monthly

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
