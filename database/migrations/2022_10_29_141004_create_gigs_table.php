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
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->contrained()->onDelete('cascade');
            $table->string('company_name', 100);
            $table->string('job_title', 100);
            $table->string('job_location', 100);
            $table->string('company_email', 100)->nullable();
            $table->string('company_website', 100)->nullable();
            $table->string('company_logo', 200)->nullable();
            $table->text('job_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gigs');
    }
};
