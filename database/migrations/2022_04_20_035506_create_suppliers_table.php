<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('phone1');
            $table->string('phone2')->nullable();

            $table->string('email')->unique();
            $table->string('email2')->unique()->nullable();
            $table->string('company_name');
            $table->string('url')->nullable();
            $table->integer('tax_number')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('region_id')->unsigned();
            $table->integer('postal_code');


            $table->string('adress')->nullable();
            $table->string('created_by');
            $table->integer('remove')->default(0);
            $table->decimal('balance',8,2)->default(0.00);
            $table->text('photo')->nullable();

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
        Schema::dropIfExists('suppliers');
    }
}
