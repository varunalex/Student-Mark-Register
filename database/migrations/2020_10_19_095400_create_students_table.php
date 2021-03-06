<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('f_name', 15);
            $table->string('l_name', 15);
            $table->string('initials', 100);
            $table->string('reg_no', 10)->unique();
            $table->string('image', 50)->nullable();
            $table->string('address');
            $table->date('dob');
            $table->enum('gender', ['M', 'F']);
            $table->string('guardian', 100);
            $table->unsignedBigInteger('grade_id');
            $table->foreign('grade_id')->references('id')->on('grades');
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
        Schema::dropIfExists('students');
    }
}
