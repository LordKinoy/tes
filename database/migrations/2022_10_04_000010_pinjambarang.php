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
        $this->table = 'pinjam_barang';
    }
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->char('id_pinjam',11)->primary();
            $table->char('peminjam',8)->nullable();
            $table->date('tgl_pinjam')->nullable();
            $table->char('brg_pinjam',7)->nullable();
            $table->char('jml_pinjam',11)->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->char('kondisi',8)->nullable();

            $table->foreign('peminjam')->references('id_user')->on('user')->cascadeOnDelete();    
            $table->foreign('brg_pinjam')->references('id_barang')->on('barang')->cascadeOnDelete();  

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
