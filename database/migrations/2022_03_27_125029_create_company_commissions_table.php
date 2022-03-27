<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyCommissionsTable extends Migration {

    public function up() {
        Schema::create('company_commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained('contracts');
            $table->foreignId('quota_id')->constrained('quotas');
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('branch_id')->constrained('branches');
            $table->foreignId('seller_id')->constrained('users');
            $table->float('value');
            $table->date('commission_date');
            $table->integer('period');
            $table->boolean('half_installment')->default(true);
            $table->float('base_value');
            $table->float('percentage');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('company_commissions');
    }

}
