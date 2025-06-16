<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->string('transaction_id');
            $table->decimal('amount', 8, 2);
            $table->timestamps();

            // Ensure a user can't pay for the same movie twice
            $table->unique(['user_id', 'movie_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_payments');
    }
};
