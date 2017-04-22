<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEugenetolokTelegramDialogsSteps2 extends Migration
{
    public function up()
    {
        Schema::table('eugenetolok_telegram_dialogs_steps', function($table)
        {
            $table->increments('id');
        });
    }
    
    public function down()
    {
        Schema::table('eugenetolok_telegram_dialogs_steps', function($table)
        {
            $table->dropColumn('id');
        });
    }
}
