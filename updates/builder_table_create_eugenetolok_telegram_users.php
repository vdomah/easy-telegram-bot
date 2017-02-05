<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEugenetolokTelegramUsers extends Migration
{
    public function up()
    {
        Schema::create('eugenetolok_telegram_users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->integer('branch_id')->unsigned();
            $table->integer('step_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('eugenetolok_telegram_users');
    }
}
