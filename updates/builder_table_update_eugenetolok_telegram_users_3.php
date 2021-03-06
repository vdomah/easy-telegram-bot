<?php namespace EugeneTolok\Telegram\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEugenetolokTelegramUsers3 extends Migration
{
    public function up()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->integer('dialog_id')->unsigned()->change();
            $table->integer('step_id')->unsigned()->change();
            $table->text('vars')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('eugenetolok_telegram_users', function($table)
        {
            $table->integer('dialog_id')->unsigned(false)->change();
            $table->integer('step_id')->unsigned(false)->change();
            $table->text('vars')->nullable(false)->change();
        });
    }
}
