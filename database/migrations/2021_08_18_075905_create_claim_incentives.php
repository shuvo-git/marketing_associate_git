<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimIncentives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_incentives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('associate_id',10);
            $table->string('branch_id',9);
            $table->bigInteger('rm_id');
            $table->string('attachment',30);
            $table->date('claim_date');
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
        Schema::dropIfExists('claim_incentives');
    }
}
