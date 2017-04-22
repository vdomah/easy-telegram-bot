<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteEugenetolokTelegramDialogsSteps extends Migration
{
    public function up()
    {
        Schema::dropIfExists('eugenetolok_telegram_dialogs_steps');
    }
    
    public function down()
    {
        Schema::create('eugenetolok_telegram_dialogs_steps', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('dialog_id');
            $table->integer('step_id');
        });
    }
}
