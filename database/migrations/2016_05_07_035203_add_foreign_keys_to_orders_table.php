<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table) {
            $table->foreign('client_id', 'orders_fk0')->references('id')->on('clients')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('tenant_id', 'orders_fk1')->references('id')->on('tenants')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'orders_fk2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function(Blueprint $table)
        {
            $table->dropForeign('orders_fk0');
			$table->dropForeign('orders_fk1');
			$table->dropForeign('orders_fk2');
        });
    }

}
