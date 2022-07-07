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
    public function up()
    {

        Schema::create('listas', function (Blueprint $table) {    
            $table->id();
            $table->integer('mes');
            $table->integer('ano');
            $table->string('observacao')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });


        Schema::create('beneficiado_lista', function (Blueprint $table) {
           
            $table->id();
            $table->foreignId('beneficiado_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('lista_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            

        });



        
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listas');
        Schema::dropIfExists('beneficiado_lista');
 

    }
};