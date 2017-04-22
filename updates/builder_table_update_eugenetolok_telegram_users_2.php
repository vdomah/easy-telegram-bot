<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEugenetolokTelegramUsers2 extends Migration
{
    public function up()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->integer('dialog_id')->nullable()->change();
            $table->integer('step_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->integer('dialog_id')->nullable(false)->change();
            $table->integer('step_id')->nullable(false)->change();
        });
    }
}
