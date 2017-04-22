<?php namespace EugeneTolok\Telegram;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
        return [
            'config' => [
                'label'       => 'Telegram',
                'icon'        => 'icon-paper-plane',
                'description' => 'Set main Telegram configs.',
                'class'       => 'Eugenetolok\Telegram\Models\Settings',
                'permissions' => ['Telegram'],
                'order'       => 600
            ]
        ];
    }
}
