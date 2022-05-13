<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTableLeadForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_lead_form', function (Blueprint $table) {
            $table->id();
            $table->string('fullname',50)->required();
            $table->string('email',75)->required()->unique();
            $table->string('phone',15)->required()->unique();
            $table->string('address',200)->nullable();
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
        Schema::dropIfExists('table_lead_form');
    }
}
