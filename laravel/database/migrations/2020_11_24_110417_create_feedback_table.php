<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128)->nullable(false)->comment('Имя пользователя');
            $table->string('email', 256)->nullable(false)->comment('Email пользователя');
            $table->string('theme', 256)->nullable(false)->comment('Краткое содержание');
            $table->text('body')->nullable(false)->comment('Содержимое сообщения');
            $table->boolean('answer')->default(false)->comment('Флаг обратной связи');

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
        Schema::dropIfExists('feedback');
    }
}
