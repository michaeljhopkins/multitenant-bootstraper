<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id')->index('products_fk0');
            $table->unsignedInteger('tenant_id')->index('products_fk1');
			$table->string('name');
			$table->string('slug')->unique('slug');
            $table->timestamps();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->unsignedInteger('deleted_by')->nullable();
        });
        Schema::create('permission_role',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('permission_id');
            $table->unsignedInteger('role_id');
        });
        Schema::create('permission_user',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('permission_id');
            $table->unsignedInteger('user_id');
        });
        Schema::create('role_user',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
        
    }

}
