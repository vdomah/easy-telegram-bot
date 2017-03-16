<?php namespace EugeneTolok\Telegram\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Send extends Controller
{
    public $implement = ['Backend\Behaviors\ListController'];
    
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'Telegram' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('EugeneTolok.Telegram', 'main-menu-item', 'side-menu-item4');
    }
}