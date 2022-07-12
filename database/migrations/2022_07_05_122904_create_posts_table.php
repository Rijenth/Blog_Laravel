<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Si on supprime un utilisateur, alors tout ses posts disparaissents.
            $table->foreignId('category_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->timestamp('date')->nullable();
            $table->text('redirect');
            $table->text('body');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
