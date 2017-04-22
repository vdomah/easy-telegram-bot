<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEugenetolokTelegramVariables extends Migration
{
    public function up()
    {
        Schema::create('eugenetolok_telegram_variables', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('variable');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('eugenetolok_telegram_variables');
    }
}
