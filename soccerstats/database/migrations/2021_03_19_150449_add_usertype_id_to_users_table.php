<?php

use App\Models\Usertype;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsertypeIdToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('usertype_id')->after('id')->default(Usertype::where('name', 'guest')->first()->id);

            $table->foreign('usertype_id')->references('id')->on('usertypes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['usertype_id']);
            $table->dropColumn('usertype_id');
        });
    }
}
