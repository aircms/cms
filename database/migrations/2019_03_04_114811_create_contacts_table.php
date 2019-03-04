<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('name');
            $table->integer('sex')->default(1);
            $table->integer('age')->default(0);
            $table->string('address')->nullable();
            $table->string('title')->nullable();
            $table->text('message');
            $table->text('reply')->nullable();
            $table->string('reply_channel')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
