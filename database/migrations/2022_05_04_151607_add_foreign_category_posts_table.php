<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryPostsTable extends Migration
{
   public function up()
   {
      Schema::table('posts', function(Blueprint $table) {
         
         // creo colonna
         $table->unsignedBigInteger('category_id')
            ->nullable()
            ->after('slug');
         
         // creo foreign key
         $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('set null'); // in base ai casi
      });
   }


   public function down()
   {
      Schema::table('posts', function(Blueprint $table) {

         // elimino foreign key
         $table->dropForeign('posts_category_id_foreign');
         // $table->dropForeign(['category_id']); oppure in questo formato
         
         // elimino colonna
         $table->dropColumn('category_id');
      });
   }

}
