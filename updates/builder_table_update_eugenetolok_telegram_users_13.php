<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEugenetolokTelegramUsers13 extends Migration
{
    public function up()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->integer('chat_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->integer('chat_id')->nullable(false)->change();
        });
    }
}
