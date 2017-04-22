<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEugenetolokTelegramUsers10 extends Migration
{
    public function up()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->dropColumn('deleted_at');
        });
    }
    
    public function down()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->timestamp('deleted_at')->nullable();
        });
    }
}
