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
            $table->string('subject', 256)->nullable(false)->comment('Краткое содержание');
            $table->text('message')->nullable(false)->comment('Содержимое сообщения');
            $table->text('notes')->nullable()->comment('Заметки');
            $table->boolean('response')->default(false)->comment('Флаг обратной связи');

            $table->timestamps();
            $table->softDeletes();
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
