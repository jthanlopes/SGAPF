<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToMensagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('mensagens', function(Blueprint $table)
      {
        $table->foreign('empresa_destinataria', 'fk_destina_empresa1')->references('id')->on('empresas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        $table->foreign('empresa_remetente', 'fk_remete_empresa2')->references('id')->on('empresas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        $table->foreign('freelancer_remetente', 'fk_remete_freela1')->references('id')->on('freelancers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        $table->foreign('freelancer_destinatario', 'fk_destina_freela2')->references('id')->on('freelancers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        $table->foreign('admin_destinatario', 'fk_destina_admin')->references('id')->on('admins')->onUpdate('NO ACTION')->onDelete('NO ACTION');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::table('mensagens', function(Blueprint $table)
     {
      $table->dropForeign('fk_destina_empresa1');
      $table->dropForeign('fk_remete_empresa2');
      $table->dropForeign('fk_remete_freela1');
      $table->dropForeign('fk_destina_freela2');
      $table->dropForeign('fk_destina_admin');
    });
   }
 }
