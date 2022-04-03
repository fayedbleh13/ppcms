<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reference_id')->unique();
            $table->bigInteger('emp_id')->unsigned();
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('working_days');
            $table->integer('overtime_hrs')->nullable();
            $table->tinyInteger('holiday')->nullable();
            $table->double('bonus')->nullable();
            $table->integer('late');
            $table->integer('absences')->nullable();
            $table->tinyInteger('thirth_monthpay')->nullable();
            $table->double('salary')->nullable();
            $table->double('sss')->nullable();
            $table->double('pagibig')->nullable();
            $table->double('philhealth')->nullable();
            $table->date('date_from');
            $table->date('date_to');
            $table->enum('payroll_status',['paid','unpaid']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}
