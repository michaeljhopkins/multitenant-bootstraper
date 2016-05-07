<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('client_id')->index('orders_fk0');
			$table->unsignedInteger('tenant_id')->index('orders_fk1');
			$table->decimal('total', 10, 0)->nullable();
			$table->unsignedInteger('user_id')->index('orders_fk2');
            $table->timestamps();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->unsignedInteger('deleted_by')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }

}
