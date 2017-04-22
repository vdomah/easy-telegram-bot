<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEugenetolokTelegramUsers2 extends Migration
{
    public function up()
    {
        Schema::create('eugenetolok_telegram_users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('dialog_id')->unsigned();
            $table->integer('step_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('eugenetolok_telegram_users');
    }
}
