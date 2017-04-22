<?php namespace EugeneTolok\Telegram\Models;

use Model;

/**
 * Model
 */
class Dialog extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'eugenetolok_telegram_dialogs';

    public $jsonable = ['steps_order'];

    public $belongsTo = [
        'step' => [
            'EugeneTolok\Telegram\Models\Step',
            'table' => 'eugenetolok_telegram_steps',
            'order' => 'name'
        ]
    ];
}