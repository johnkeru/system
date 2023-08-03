<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate_document', function (Blueprint $table) {
            $table->id();
            $table->longText('pdf');
            $table->foreignId('org_data_id')
                ->nullable()
                ->constrained('org_data')
                ->onDelete('cascade');
            $table->string('file_name')->nullable();
            $table->string('file')->nullable();
            $table->foreignId('status_id')
                ->nullable()
                ->constrained('doc_status')
                ->onDelete('cascade');
            $table->string('control_number')->nullable();
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
        Schema::dropIfExists('generate_document');
    }
}