<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotasTable extends Migration {

    public function up() {
        Schema::create('quotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained('contracts');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('branch_id')->constrained('branches');
            $table->foreignId('seller_id')->constrained('users');
            $table->float('credit');
            $table->integer('installments_paid')->default(0);
            $table->string('group');
            $table->string('quota');
            $table->dateTime('date_contemplation');
            $table->dateTime('date_sale');
            $table->string('type_sale');
            $table->foreignId('consortium_type_id')->constrained('consortium_types');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('quotas');
    }

}
