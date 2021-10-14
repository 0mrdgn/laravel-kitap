<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('permission')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

  /*  public function in_array()
    {
        $yetki = [ROLE_USER, ROLE_SUPERADMIN, ROLE_ADMIN];
        in_array() = (ROLE_DELETE, ROLE_USER, $yetki);
    $yetki = e.json;
    }
*/
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
