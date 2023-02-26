<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petugas_id');
            $table->foreignId('produk_id');
            $table->integer('customer_id');
            // $table->string('meja_customer')->nullable();
            $table->integer('jenis_pembayaran');
            $table->string('code_transaksi');
            $table->bigInteger('order_id')->nullable();//jika transfer
            $table->integer('quantity');
            $table->bigInteger('harga_satuan');
            $table->bigInteger('jumlah_harga');
            $table->text('note')->nullable();
            $table->string('snap_token')->nullable();
            $table->string('url_midtrans')->nullable();
            $table->enum('status', ['WAITING', 'PENDING', 'CANCEL', 'SUCCESS'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
