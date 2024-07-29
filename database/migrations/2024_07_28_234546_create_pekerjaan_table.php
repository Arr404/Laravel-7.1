<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namaPekerjaan');
            $table->string('alamatPekerjaan');
            $table->string('nomorPekerjaan');
            $table->timestamps();
        });

        Schema::table('mahasiswas', function (Blueprint $table) {
                    $table->unsignedInteger('pekerjaan_id')->nullable()->after('ijazah');
                    $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan')->onDelete('set null');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::table('mahasiswas', function (Blueprint $table) {
                $table->dropForeign(['pekerjaan_id']);
                $table->dropColumn('pekerjaan_id');
            });
        Schema::dropIfExists('pekerjaan');

    }
}
