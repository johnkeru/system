<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_document', function (Blueprint $table) {
            $table->id();
            $table->string('control_number')->nullable();
            $table->foreignId('adv_approved_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade');
            $table->boolean('adviser_approved')->nullable();
            $table->date('adv_app_date')->nullable();
            $table->string('adv_notes')->nullable();
            $table->foreignId('osas_approved_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade');
            $table->boolean('osas_approved')->nullable();
            $table->date('osas_app_date')->nullable();
            $table->string('osas_notes')->nullable();

            // $table->string('osas_signature_image')->nullable();
            // $table->string('adv_signature_image')->nullable();
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
        Schema::dropIfExists('track_document');
    }
}