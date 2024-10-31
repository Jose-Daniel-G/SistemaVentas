<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('country', 100);
            $table->string('company_name', 255);
            $table->string('company_type', 100);
            $table->string('nit', 50)->unique();
            $table->string('phone', 20);
            $table->string('email')->unique();
            $table->decimal('tax_amount', 10, 2);
            $table->string('tax_name', 100);
            $table->string('currency');
            $table->text('address');
            $table->string('city');
            $table->string('department');
            $table->string('zip_code', 20);
            $table->text('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
