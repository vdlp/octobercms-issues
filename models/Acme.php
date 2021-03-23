<?php

declare(strict_types=1);

namespace Vdlp\Acme\Models;

use October\Rain\Database\Model;
use October\Rain\Database\Relations\AttachOne;
use System\Models\File;

/**
 * @method AttachOne attachment()
 */
final class Acme extends Model
{
    public $table = 'vdlp_acme_acmes';

    public $keyType = 'int'; // which is default

    public $attachOne = [
        'attachment' => [
            File::class,
        ],
    ];

    protected $guarded = [];
}
