<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\StatusIndicacao;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('nome');
            $table->string('cpf', 11);
            $table->text('telefone');
            $table->text('email');
            $table->tinyInteger('status_indicacao')->unsigned()->default(StatusIndicacao::Iniciada);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicados');
    }
};
