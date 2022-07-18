<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoteFieldRemindersAndUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reminders', function (Blueprint $table) {
            $table->longText('note')->nullable();
        });
        Schema::table('submission_user_notifications', function (Blueprint $table) {
            $table->longText('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submission_user_notifications', function (Blueprint $table) {
            $table->dropColumn('note');
        });
        Schema::table('reminders', function (Blueprint $table) {
            $table->dropColumn('note');
        });
    }
}
