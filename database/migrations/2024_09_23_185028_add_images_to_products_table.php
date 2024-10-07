<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagesToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Ajouter la colonne main_image pour stocker le chemin de l'image principale
            $table->string('main_image')->nullable()->after('price');

            // Ajouter la colonne other_images pour stocker les chemins des autres images sous forme de JSON
            $table->json('other_images')->nullable()->after('main_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Supprimer les colonnes si la migration est annulée
            $table->dropColumn('main_image');
            $table->dropColumn('other_images');
        });
    }
}
