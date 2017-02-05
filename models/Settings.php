<?php namespace EugeneTolok\Telegram\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'eugenetolok_telegram_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}