<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBillingDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_billing_datas', function (Blueprint $table) {
            $table->id();
            $table->integer("billing_type_id");
            $table->string("company_name")->nullable();
            $table->string("tax_number")->nullable();
            $table->string("address");
            $table->string("address2");
            $table->string("city");
            $table->string("province_id");
            $table->string("postcode");
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
        Schema::dropIfExists('user_billing_datas');
    }
}
