<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('company')->unsigned();
            $table->string('email');
            $table->string('phone');
            $table->timestamps();

        });

        Schema::table('employees', function($table) {
            $table->index('company');
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('employees_company_foreign');
        $table->dropIndex('employees_company_index');
        Schema::dropIfExists('employees');
    }
}
