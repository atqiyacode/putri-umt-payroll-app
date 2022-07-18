<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('durations', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->timestamps();
        });

        Schema::table('submissions', function (Blueprint $table) {
            $table->unsignedBigInteger('duration_id');
            $table->foreign('duration_id')
                ->references('id')->on('durations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->dropForeign('submissions_duration_id_foreign');
            $table->dropColumn('duration_id');
        });

        Schema::dropIfExists('durations');
    }
}
