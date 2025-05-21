<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->integer('order_id')->primary();
            $table->decimal('order_cost', 20, 0)->nullable();
            $table->string('order_status', 50)->collation('armscii8_bin')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_phone', 50)->collation('armscii8_bin')->nullable();
            $table->string('user_city', 50)->collation('armscii8_bin')->nullable();
            $table->string('user_address', 50)->collation('armscii8_bin')->nullable();
            $table->dateTime('order_date')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
