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
        Schema::create('jobcards', function (Blueprint $table) {
            $table->id();
            $table->string('tachname');
            $table->string('clientname');
            $table->string('clientemail');
            $table->string('clientnumber');
            $table->string('sitename');
            $table->string('signature');
            $table->text('description');
            $table->time('starttime');
            $table->time('endtime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void

    
    {
        Schema::dropIfExists('jobcards');
    }
};
