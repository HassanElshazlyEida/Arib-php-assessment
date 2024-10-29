<?php

use App\Models\Employee;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("description", 1000);

            $table->foreignIdFor(Manager::class)
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreignIdFor(Employee::class)
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
