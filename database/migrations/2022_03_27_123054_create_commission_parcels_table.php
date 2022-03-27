<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionParcelsTable extends Migration {

    public function up() {
        Schema::create('commission_parcels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commission_rule_id')->constrained('commission_rules');
            $table->integer('parcel_number');
            $table->float('percentage_to_pay');
            $table->float('chargeback_percentage');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('commission_parcels');
    }

}
