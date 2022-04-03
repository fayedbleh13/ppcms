<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('emp_id')->unsigned();
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('payroll_id')->unsigned();
            $table->bigInteger('leave_id')->unsigned();
            $table->foreign('leave_id')->references('id')->on('leaves')->onDelete('cascade')->onUpdate('cascade');
            $table->double('leave_amount')->nullable();
            $table->double('total_deductions')->nullable();
            $table->integer('absences_amount')->nullable();
            $table->double('overtime')->nullable();
            $table->double('total_services_amount')->nullable();
            $table->double('gross_salary')->nullable();
            $table->double('net_salary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payroll_items');
    }
}
