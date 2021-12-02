<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropOpcaoFromRespostasAndAddIndexToHash extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('respostas', function (Blueprint $table) {
            $table->dropColumn('opcao_id');
        });

        Schema::table('identificadores', function (Blueprint $table) {
            $table->string('hash', 40)->unique('hash')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('respostas', function (Blueprint $table) {
            $table->foreignIdFor(Opcao::class);
        });

        Schema::table('identificadores', function (Blueprint $table) {
            $table->string('hash', 40)->change();
        });
    }
}
