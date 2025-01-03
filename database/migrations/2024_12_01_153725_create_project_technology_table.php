<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('project_technology', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('technology_id');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('technology_id')->references('id')->on('technology')->onDelete('cascade');
            $table->primary(['project_id', 'technology_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
