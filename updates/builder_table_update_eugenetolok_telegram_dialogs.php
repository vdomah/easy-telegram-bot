<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEugenetolokTelegramDialogs extends Migration
{
    public function up()
    {
        Schema::table('eugenetolok_telegram_dialogs', function($table)
        {
            $table->string('steps_order');
        });
    }
    
    public function down()
    {
        Schema::table('eugenetolok_telegram_dialogs', function($table)
        {
            $table->dropColumn('steps_order');
        });
    }
}
