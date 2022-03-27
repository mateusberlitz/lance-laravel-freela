<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration {

    public function up() {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_commission_id')->constrained('company_commissions');
            $table->foreignId('commission_rule_id')->constrained('commission_rules');
            $table->float('value');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('commissions');
    }

}
