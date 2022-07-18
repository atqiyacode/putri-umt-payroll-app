<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();

            $table->string('request_code')->unique();

            $table->string('requester');
            $table->string('division_id');
            $table->string('group_id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')
                ->references('id')->on('units')
                ->onDelete('cascade');

            $table->unsignedBigInteger('status_type_id');
            $table->foreign('status_type_id')
                ->references('id')->on('status_types')
                ->onDelete('cascade');

            $table->string('name_of_parameter');
            $table->string('other_parameter');
            $table->dateTime('start');
            $table->dateTime('finish');
            $table->longText('reason');
            $table->longText('impact')->nullable();
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
        Schema::dropIfExists('submissions');
    }
}
