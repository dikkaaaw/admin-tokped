<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->notNull();
            $table->string('password');
            $table->string('name');
            $table->string('address')->nullable();
            $table->integer('is_admin')->default(0);
            $table->timestamps();
        });

        // Tabel products
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('category');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
        });

        // Tabel orders
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_product')->constrained('products')->onDelete('cascade');
            $table->boolean('is_checkout')->default(false);
            $table->timestamps();
        });

        // Tabel order_messages
        Schema::create('order_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order')->constrained('orders')->onDelete('cascade');
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_messages');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('products');
        Schema::dropIfExists('users');
    }
};
