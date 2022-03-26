<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargebackTypesTable extends Migration {

    public function up() {
        Schema::create('chargeback_types', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('chargeback_types');
    }

}
