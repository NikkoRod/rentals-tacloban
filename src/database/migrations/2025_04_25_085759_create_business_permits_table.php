<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPermitsTable extends Migration
{
    public function up()
    {
        Schema::create('business_permits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to the users table (for landlords)
            $table->string('permit_path'); // Path to the PDF of the business permit
            $table->boolean('is_approved')->default(0); // 0 for unapproved, 1 for approved
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_permits');
    }
}
