<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $table;
    function __construct()
    {
        $this->table = 'barang_masuk';
    }
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->char('id_barang',7)->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->integer('jumlah_masuk',11)->nullable();
            $table->string('supplier', 4)->nullable();

            $table->foreign('id_barang')->references('id_barang')->on('barang')->cascadeOnDelete();
            $table->foreign('supplier')->references('id_supplier')->on('supplier')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
};
