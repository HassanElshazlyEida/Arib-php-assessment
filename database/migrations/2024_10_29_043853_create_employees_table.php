<?php

use App\Models\Department;
use App\Models\Manager;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->decimal("salary",8,2);
            $table->string('image')->nullable();
            $table->foreignIdFor(Manager::class)
            ->nullable()
            ->constrained()
            ->nullOnDelete()
            ->nullOnUpdate();
            $table->foreignIdFor(Department::class)
            ->nullable()
            ->constrained()
            ->nullOnDelete()
            ->nullOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
