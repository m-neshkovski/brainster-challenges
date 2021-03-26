<?php

use App\Models\Usertype;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsertypesTable extends Migration
{
    public function up()
    {
        Schema::create('usertypes', function (Blueprint $table) {
            $table->id();
                $table->string('name');
            $table->timestamps();
        });

        Usertype::create(['name' => 'admin']);
        Usertype::create(['name' => 'guest']);
    }

    public function down()
    {
        Schema::dropIfExists('usertypes');
    }
}
