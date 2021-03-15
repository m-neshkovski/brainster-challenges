<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Usertype;
Use Illuminate\Support\Str;

class AlterUsersTableFirstNameLastName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable()->after('name');
            $table->renameColumn('name', 'first_name');
        });

        User::create([
            'first_name' => 'Administrator',
            'email' => 'admin@blog.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Kumanovo1.'),
            'usertype_id' => Usertype::where('type', 'admin')->first()->id,
            'remember_token' => Str::random(10),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->renameColumn('first_name', 'name');
        });
    }
}
