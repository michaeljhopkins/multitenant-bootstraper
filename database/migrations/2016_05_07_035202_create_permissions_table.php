<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('client_id')->index('permissions_fk0');
			$table->unsignedInteger('tenant_id')->index('permissions_fk1');
			$table->string('name');
			$table->string('slug')->unique('slug');
            $table->timestamps();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->softDeletes();
            $table->unsignedInteger('deleted_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissions');
    }

}
