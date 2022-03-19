<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration {

    public function up() {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('cpf_cnpj');
            $table->enum('type_customer', ['PF', 'PJ']);
            $table->date('birth_date')->nullable();
            $table->string('civil_status')->nullable();
            $table->foreignId('city_id')->constrained('cities');
            $table->string('cep');
            $table->string('address');
            $table->string('neighborhood');
            $table->string('number');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('customers');
    }

}
