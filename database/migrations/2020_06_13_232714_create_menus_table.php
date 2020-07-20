<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('intro');
            $table->string('image')->nullable();
            $table->timestamps();

        });
        DB::table('menus')->insert(
          array(
          'title'=>'susans blog',
          'intro'=>
          'Hi, my name is Chutiya Stha. Ma ghu khani manxe hun.i like to eat shit.',
        )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
