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
        $this->table = 'barang';
    }
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->char('id_barang',7)->primary();
            $table->string('nama_barang',255)->nullable();
            $table->string('spesifikasi',255)->nullable();
            $table->char('asal_lokasi',3)->nullable();
            $table->string('kondisi', 20)->nullable();
            $table->char('jumlah_barang',11)->nullable();
            $table->char('sumber_dana',4)->nullable();


            $table->foreign('sumber_dana')->references('id_sumber')->on('sumber_dana')->cascadeOnDelete();
            $table->foreign('asal_lokasi')->references('id_lokasi')->on('lokasi')->cascadeOnDelete();


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
