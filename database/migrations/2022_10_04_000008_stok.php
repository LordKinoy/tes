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
        $this->table = 'stok';
    }
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->char('id_barang',7)->nullable();
            $table->char('jml_masuk',11)->nullable();
            $table->char('jml_keluar',11)->nullable();
            $table->char('total', 11)->nullable();

            $table->foreign('id_barang')->references('id_barang')->on('barang')->cascadeOnDelete();


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
