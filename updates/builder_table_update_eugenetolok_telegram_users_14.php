<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEugenetolokTelegramUsers14 extends Migration
{
    public function up()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->string('user_name')->nullable();
            $table->string('last_name')->nullable();
            $table->boolean('blocked')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->dropColumn('user_name');
            $table->dropColumn('last_name');
            $table->dropColumn('blocked');
        });
    }
}
