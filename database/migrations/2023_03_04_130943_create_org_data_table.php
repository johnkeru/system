<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('org_list_id')
                ->nullable()
                ->constrained('org_list')
                ->onDelete('cascade');
            $table->foreignId('student_info_id')
                ->nullable()
                ->constrained('student_info')
                ->onDelete('cascade');
            $table->foreignId('employee_info_id')
                ->nullable()
                ->constrained('employee_info')
                ->onDelete('cascade');
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
        Schema::dropIfExists('org_data');
    }
}
