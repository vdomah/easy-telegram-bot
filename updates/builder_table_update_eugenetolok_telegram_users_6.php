<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEugenetolokTelegramUsers6 extends Migration
{
    public function up()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->string('first_name')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->string('first_name', 255)->nullable(false)->change();
        });
    }
}
