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
        // I need to change the user_id to be album_id as a foreign key instead
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign('images_user_id_foreign');
            $table->dropColumn('user_id');
    
            if (!Schema::hasColumn('photos', 'album_id')) {
                $table->foreignId('album_id')->constrained()->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign(['album_id']);
            $table->dropColumn('album_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
};
