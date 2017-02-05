<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEugenetolokTelegramSteps extends Migration
{
    public function up()
    {
        Schema::create('eugenetolok_telegram_steps', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->text('code');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('eugenetolok_telegram_steps');
    }
}
