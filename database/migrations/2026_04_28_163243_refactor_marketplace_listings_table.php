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
        Schema::table('marketplace_listings', function (Blueprint $table) {
            // Drop old B2C-unlinked fields
            $table->dropConstrainedForeignId('product_id');
            $table->dropColumn(['name', 'price', 'condition_rating']);

            // Add new Parasitic Model fields
            $table->foreignUuid('product_variant_id')->after('user_id')->constrained('product_variants')->onDelete('cascade');
            $table->decimal('asking_price', 15, 2)->after('product_variant_id');
            $table->string('condition')->after('asking_price'); // 'new_with_box', 'like_new', 'good', 'fair'

            // Rename/Update description
            $table->text('description')->change(); // Ensure it's text
        });

        Schema::table('marketplace_listings', function (Blueprint $table) {
            $table->renameColumn('description', 'seller_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('marketplace_listings', function (Blueprint $table) {
            $table->renameColumn('seller_description', 'description');
        });

        Schema::table('marketplace_listings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('product_variant_id');
            $table->dropColumn(['asking_price', 'condition']);

            $table->foreignUuid('product_id')->nullable()->constrained('products')->onDelete('set null');
            $table->string('name');
            $table->decimal('price', 15, 2);
            $table->unsignedTinyInteger('condition_rating');
        });
    }
};
