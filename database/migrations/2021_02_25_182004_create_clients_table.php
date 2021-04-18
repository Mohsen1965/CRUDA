<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('clients', function (Blueprint $table) {
          $table->bigIncrements('code');
          $table->string('formeJuridique');
          $table->string('raisonSociale');
          $table->string('tel');
          $table->string('fax');
          $table->string('email')->unique();
          $table->string('adresse');
          $table->string('ville');
          $table->string('pays');
          $table->string('matriculeFiscal');
          $table->string('registreCommerce');
          $table->string('rib');
          $table->string('banque');
          $table->string('observations');
          $table->timestamps();

          $table->unsignedBigInteger('codeContact')->nullable();;
          $table->foreign('codeContact')
            ->references('codeContact')
	           ->on('contacts')
	            ->onDelete('restrict')
	             ->onUpdate('restrict');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('contacts', function(Blueprint $table) {
			     $table->dropForeign('codeContact_foreign');

         });
          Schema::dropIfExists('clients');
  }
}
