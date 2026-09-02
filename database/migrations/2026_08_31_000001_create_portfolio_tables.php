<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('headline')->nullable();
            $t->string('location')->nullable();
            $t->string('email')->nullable();
            $t->string('phone')->nullable();
            $t->text('about')->nullable();
            $t->string('linkedin')->nullable();
            $t->string('github')->nullable();
            $t->string('website')->nullable();
            $t->string('photo_url')->nullable();
            $t->string('resume_url')->nullable();
            $t->timestamps();
        });
        Schema::create('experiences', function (Blueprint $t) {
            $t->id();
            $t->string('role');
            $t->string('company');
            $t->string('location')->nullable();
            $t->string('period');
            $t->text('description')->nullable();
            $t->unsignedInteger('sort_order')->default(0);
            $t->timestamps();
        });
        Schema::create('projects', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->string('category')->nullable();
            $t->text('description')->nullable();
            $t->string('technologies')->nullable();
            $t->string('url')->nullable();
            $t->string('image_url')->nullable();
            $t->unsignedInteger('sort_order')->default(0);
            $t->timestamps();
        });
        Schema::create('skills', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('category')->nullable();
            $t->unsignedTinyInteger('level')->nullable();
            $t->unsignedInteger('sort_order')->default(0);
            $t->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('skills');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('profiles');
    }
};
