<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteEugenetolokTelegramUsers extends Migration
{
    public function up()
    {
        Schema::dropIfExists('eugenetolok_telegram_users');
    }
    
    public function down()
    {
        Schema::create('eugenetolok_telegram_users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->integer('branch_id')->unsigned();
            $table->integer('step_id')->unsigned();
        });
    }
}
