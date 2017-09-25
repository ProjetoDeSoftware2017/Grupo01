<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Data';

    /**
     * Run the migrations.
     * @table Data
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('ano', 30);
            $table->string('mes', 45);
            $table->integer('Viade_de_acesso_id');

            $table->index(["Viade_de_acesso_id"], 'fk_Data_Viade_de_acesso1_idx');


            $table->foreign('Viade_de_acesso_id', 'fk_Data_Viade_de_acesso1_idx')
                ->references('id')->on('Viade_de_acesso')
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
