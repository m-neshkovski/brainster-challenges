<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('api_token', 64)->unique()->nullable()->after('remember_token');
            $table->string('last_name')->after('name');
            $table->renameColumn('name', 'first_name');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('api_token');
            $table->dropColumn('last_name');
            $table->renameColumn('first_name', 'name');
        });
    }
}
