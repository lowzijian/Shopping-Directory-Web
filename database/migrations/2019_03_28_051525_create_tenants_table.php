<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('shopName', 100) -> index();
            $table->char('lotNo', 6) -> index() ->unique(); /* FZ0000 */
            $table->unsignedinteger('floor');
            $table->unsignedInteger('zone_id');
            $table->unsignedInteger('category_id');
            $table->text('description') -> nullable();
            $table->timestamps();

            $table -> foreign('zone_id')
            -> references('id') -> on('zones');
            $table -> foreign('category_id')
                -> references('id') -> on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
