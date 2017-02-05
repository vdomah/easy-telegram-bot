<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEugenetolokTelegramVariables extends Migration
{
    public function up()
    {
        Schema::table('eugenetolok_telegram_variables', function($table)
        {
            $table->string('variable_name');
        });
    }
    
    public function down()
    {
        Schema::table('eugenetolok_telegram_variables', function($table)
        {
            $table->dropColumn('variable_name');
        });
    }
}
