<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by_user_id')->default(0)->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->integer('qty')->default(1)->nullable();
            $table->integer('capacity')->default(1)->nullable();
            $table->decimal('amount', 15, 2)->default(0);
            $table->string('image')->after('amount')->nullable();
            $table->longText('description')->after('image')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('accomodations');
    }
}
