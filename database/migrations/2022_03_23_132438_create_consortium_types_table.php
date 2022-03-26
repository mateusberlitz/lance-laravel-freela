<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsortiumTypesTable extends Migration {

    public function up() {
        Schema::create('consortium_types', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('consortium_types');
    }

}
