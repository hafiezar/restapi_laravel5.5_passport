<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	
	Schema::enableForeignKeyConstraints();
	Schema::create('products', function (Blueprint $table) {
	    $table->increments('id');
	    $table->integer('user_id')->unsigned();
	    $table->string('name');
	    $table->integer('price');
	    $table->timestamps();

	    $table->foreign('user_id')
	    	  ->references('id')
	    	  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	$table->dropForeign('products_user_id_foreign');
	Schema::dropIfExists('products');
    }
}
