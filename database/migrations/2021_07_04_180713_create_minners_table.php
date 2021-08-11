<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minners', function (Blueprint $table) {
            $table->id();
            $table->double('est_month_payment',12, 10);
            $table->double('current_balance',12, 10);
            $table->double('m5a_est',12, 10);
            $table->double('x60a_est',12, 10);
            $table->double('x20a_est',12, 10);
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
        Schema::dropIfExists('minners');
    }
}
