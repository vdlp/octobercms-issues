<?php

declare(strict_types=1);

namespace Vdlp\Acme\Models;

use October\Rain\Database\Model;
use October\Rain\Database\Relations\BelongsToMany;

/**
 * @method BelongsToMany items()
 */
final class Acme extends Model
{
    public $table = 'vdlp_acme_acmes'; // Borging

    public $belongsToMany = [
        'items' => [
            Item::class,
            'table' => 'vdlp_acme_acme_item',
            'key' => 'acme_id',
            'otherKey' => 'item_id',
            'pivot' => [
                'name'
            ],
            'timestamps' => true
        ],
    ];

    protected $primaryKey = 'acme_id';

    protected $guarded = [];
}
