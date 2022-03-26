<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionRulesTable extends Migration {

    public function up() {
        Schema::create('commission_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('branch_id')->constrained('branches');
            $table->boolean('half_installment')->default(true);
            $table->boolean('pay_in_contemplation')->default(false);
            $table->float('percentage_paid_in_contemplation');
            $table->foreignId('chargeback_type_id')->constrained('chargeback_types');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('commission_rules');
    }

}
