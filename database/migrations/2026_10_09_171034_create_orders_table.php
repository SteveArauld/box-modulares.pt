<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 32)->unique();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('status', 32)->default('pending');
            $table->string('payment_method', 32)->default('bacs');

            $table->string('billing_first_name', 100);
            $table->string('billing_last_name', 100);
            $table->string('billing_email', 190);
            $table->string('billing_phone', 40)->nullable();
            $table->string('billing_company', 150)->nullable();
            $table->string('billing_country', 2);
            $table->string('billing_address_1', 190);
            $table->string('billing_address_2', 190)->nullable();
            $table->string('billing_postcode', 20);
            $table->string('billing_city', 120);
            $table->string('billing_state', 120)->nullable();
            $table->text('customer_note')->nullable();

            $table->decimal('subtotal', 10, 2);
            $table->decimal('shipping_total', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->string('currency', 3)->default('EUR');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
