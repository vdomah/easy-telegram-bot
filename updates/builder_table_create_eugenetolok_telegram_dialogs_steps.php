<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEugenetolokTelegramDialogsSteps extends Migration
{
    public function up()
    {
        Schema::create('eugenetolok_telegram_dialogs_steps', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('dialog_id')->unsigned();
            $table->integer('step_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('eugenetolok_telegram_dialogs_steps');
    }
}
