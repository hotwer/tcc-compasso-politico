<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvaliacaoToIdentificadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('identificadores', function (Blueprint $table) {
            $table->smallInteger('avaliacao_pergunta_1')->nullable();
            $table->smallInteger('avaliacao_pergunta_2')->nullable();
            $table->smallInteger('avaliacao_pergunta_3')->nullable();
            $table->smallInteger('avaliacao_concordancia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('identificadores', function (Blueprint $table) {
            $table->dropColumn('avaliacao_pergunta_1');
            $table->dropColumn('avaliacao_pergunta_2');
            $table->dropColumn('avaliacao_pergunta_3');
            $table->dropColumn('avaliacao_concordancia');
        });
    }
}
