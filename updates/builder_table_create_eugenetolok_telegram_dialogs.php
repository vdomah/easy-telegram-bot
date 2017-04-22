<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEugenetolokTelegramDialogs extends Migration
{
    public function up()
    {
        Schema::create('eugenetolok_telegram_dialogs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('eugenetolok_telegram_dialogs');
    }
}
