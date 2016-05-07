<?php

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
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('client_id')->index('products_fk0');
			$table->unsignedInteger('tenant_id')->index('products_fk1');
			$table->string('name')->nullable();
			$table->decimal('price', 10, 0)->nullable();
			$table->integer('recurring')->nullable();
            $table->timestamps();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->unsignedInteger('deleted_by')->nullable();
        });
        
        Schema::create('line_items',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }

}
