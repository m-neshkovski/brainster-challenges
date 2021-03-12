<?php

use App\Models\Usertype;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersAddUsertypeIdColumnAndConstaint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('usertype_id')->default(Usertype::where('type', 'bloger')->first()->id);
            $table->foreign('usertype_id')->references('id')->on('usertypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign(['usertypes_id']);
            $table->dropColumns('users', 'usertype_id');
        });
    }
}
