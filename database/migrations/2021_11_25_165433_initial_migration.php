<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Identificador;
use App\Models\Pergunta;
use App\Models\Opcao;
use App\Models\User;

class InitialMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->unsignedBigInteger('id', autoIncrement: false)->primary();
            $table->string('nome', 100);
            $table->string('sigla', 2);
        });

        Schema::create('cidades', function (Blueprint $table) {
            $table->unsignedBigInteger('id', autoIncrement: false)->primary();
            $table->string('nome', 100);
            $table->foreignIdFor(Estado::class);
        });

        Schema::create('identificadores', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 80);
            $table->string('hash', 40);
            $table->foreignIdFor(Cidade::class);
            $table->foreignIdFor(Estado::class);
            $table->timestamps();
        });

        Schema::create('perguntas', function (Blueprint $table) {
            $table->id();
            $table->string('texto');
            $table->string('autor')->nullable();
            $table->foreignIdFor(User::class)->nullable();
            $table->timestamps();
        });

        Schema::create('opcoes', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('peso_econ');
            $table->smallInteger('peso_dipl');
            $table->smallInteger('peso_govt');
            $table->smallInteger('peso_scty');
            $table->foreignIdFor(Pergunta::class);
            $table->timestamps();
        });

        Schema::create('respostas', function (Blueprint $table) {
            $table->id();
            $table->decimal('multiplicador', 4, 2);
            $table->foreignIdFor(Pergunta::class);
            $table->foreignIdFor(Opcao::class);
            $table->foreignIdFor(Identificador::class);
            $table->timestamps();
        });

        Schema::create('ideologias', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->smallInteger('base_econ');
            $table->smallInteger('base_dipl');
            $table->smallInteger('base_govt');
            $table->smallInteger('base_scty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ideologias');
        Schema::drop('identificador');
        Schema::drop('pergunta');
        Schema::drop('resposta');
        Schema::drop('cidade');
        Schema::drop('estado');
    }
}
