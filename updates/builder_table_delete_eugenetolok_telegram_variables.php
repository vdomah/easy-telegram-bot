<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteEugenetolokTelegramVariables extends Migration
{
    public function up()
    {
        Schema::dropIfExists('eugenetolok_telegram_variables');
    }
    
    public function down()
    {
        Schema::create('eugenetolok_telegram_variables', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('variable', 255);
            $table->string('variable_name', 255);
        });
    }
}
