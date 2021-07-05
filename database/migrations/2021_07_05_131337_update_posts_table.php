<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //per creare la colonna category_id che diventerà foreign key
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            //setto la colonna come foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            //elimino la foreign key
            $table->dropForeign(['category_id']);
            
            //elimino la colonna
            $table->dropColumn('category_id');

        });
    }
}
