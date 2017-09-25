<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViadeDeAcessoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Viade_de_acesso';

    /**
     * Run the migrations.
     * @table Viade_de_acesso
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('descricao', 45);
            $table->integer('UF_id');

            $table->index(["UF_id"], 'fk_Viade_de_acesso_UF1_idx');


            $table->foreign('UF_id', 'fk_Viade_de_acesso_UF1_idx')
                ->references('id')->on('UF')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
