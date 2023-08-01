<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->array_unique();
            $table->string('address')->nullable();//có cũng đc ko cũng dc
            $table->date('date_of_birth');
            $table->integer('status')->default(2);//khởi tạo giá trị mặc định là 1
            $table->string('image')->nullable();
            $table->timestamps(); 
            $table->softDeletes(); // add
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
