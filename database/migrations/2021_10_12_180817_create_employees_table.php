<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('employee_id')->unique();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('leave_id')->nullable()->unsigned();
            $table->foreign('leave_id')->references('id')->on('leaves')->onDelete('cascade');
            $table->string('name');
            $table->enum('job_type',['mechanic','cashier','employee']);
            $table->enum('gender',['male','female']);
            $table->string('mobile');
            $table->string('email');
            $table->double('salary_rate');
            $table->tinyInteger('mechanic_status');
            $table->tinyInteger('status')->comment('leave_status');
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
        Schema::dropIfExists('employees');
    }
}
