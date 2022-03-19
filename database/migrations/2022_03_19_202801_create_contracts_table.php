<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration {

    public function up() {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('number_contract');
            $table->foreignId('customer_id')->constrained('customers');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('contracts');
    }

}
