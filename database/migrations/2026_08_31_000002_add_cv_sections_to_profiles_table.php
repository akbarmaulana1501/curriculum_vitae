<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->text('education')->nullable()->after('about');
            $table->text('strengths')->nullable()->after('education');
            $table->text('achievement')->nullable()->after('strengths');
        });
    }
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['education', 'strengths', 'achievement']);
        });
    }
};
