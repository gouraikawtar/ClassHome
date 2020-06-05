<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupJunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_junctions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete(); 
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_junctions');
    }
}
