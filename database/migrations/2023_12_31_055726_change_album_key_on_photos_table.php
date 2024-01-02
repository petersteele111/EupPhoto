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
        Schema::table('photos', function (Blueprint $table) {
            // Check if the foreign key exists before trying to drop it
            if (Schema::hasColumn('photos', 'user_id')) {
                $table->dropForeign('photos_user_id_foreign'); // Update the foreign key name
                $table->dropColumn('user_id');
            }

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
