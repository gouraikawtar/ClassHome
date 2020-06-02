<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title',50);
            $table->string('description',255)->nullable();
            $table->date('deadline');
            $table->time('expire_at');
            $table->enum('status',['Active','Expired'])->default('Active');
            $table->foreignId('teaching_class_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homeworks');
    }
}
