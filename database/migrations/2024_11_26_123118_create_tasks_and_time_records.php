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
        // Create tasks table
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Create time records table
        Schema::create('records_times', function (Blueprint $table) {
            $table->id();
            // task
            $table->foreignId('task_id')
                  ->constrained('tasks')
                  ->onDelete('cascade');
            // start_time
            $table->timestamp('start_time');
            // end_time
            $table->timestamp('end_time')->nullable();
            // user
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');
            // control the creation and update of the record (no need to calc it) <- Internal control
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tables in reverse order to respect dependencies
        Schema::dropIfExists('records_times');
        Schema::dropIfExists('tasks');
    }
};
