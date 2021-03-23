<?php

declare(strict_types=1);

namespace Vdlp\Acme\Models;

use October\Rain\Database\Model;
use October\Rain\Database\Relations\BelongsToMany;

/**
 * @method BelongsToMany acmes()
 */
final class Item extends Model
{
    public $table = 'vdlp_acme_items'; // Regels

    public $belongsToMany = [
        'acmes' => [
            Acme::class,
            'table' => 'vdlp_acme_acme_item',
            'key' => 'item_id',
            'otherKey' => 'acme_id',
            'pivot' => [
                'name'
            ],
            'timestamps' => true
        ],
    ];

    protected $primaryKey = 'item_id';

    protected $guarded = [];
}
