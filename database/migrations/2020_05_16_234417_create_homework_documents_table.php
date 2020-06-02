<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework_documents', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2014_10_12_000000_create_users_table.php
            $table->rememberToken();
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number');
            $table->string('password');
            $table->enum('role',['student', 'teacher', 'admin']);
            $table->boolean('responsible')->default(false); 
            //$table->foreignId('group_id')->nullable()->constrained();
            $table->softDeletes(); 
=======
            $table->timestamps();
            $table->string('title',100);
            $table->foreignId('homework_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
>>>>>>> 4f3366f6b4f07a781ce71b0aba05641c44e8e2a3:database/migrations/2020_05_16_234417_create_homework_documents_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homework_documents');
    }
}
