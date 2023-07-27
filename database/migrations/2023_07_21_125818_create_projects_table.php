<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');//
            $table->string('phone_number');//
            $table->string('mobile_number');//
            $table->longText('notes')->nullable();
            $table->string('owner')->nullable();
            $table->string('place_number')->nullable();
            $table->string('license_number')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('project_areas')->onDelete('cascade');
            $table->unsignedBigInteger('sector_id');
            $table->foreign('sector_id')->references('id')->on('project_sectors')->onDelete('cascade');
            $table->unsignedBigInteger('board_id');
            $table->foreign('board_id')->references('id')->on('project_boards')->onDelete('cascade');
            $table->unsignedBigInteger('action_id')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
