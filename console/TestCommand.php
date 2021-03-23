<?php

declare(strict_types=1);

namespace Vdlp\Acme\Console;

use Composer\Script\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Vdlp\Acme\Models\Acme;
use Vdlp\Acme\Models\Item;

final class TestCommand extends Command
{
    public function __construct()
    {
        $this->signature = 'vdlp:acme:test';
        $this->description = 'A test command';

        parent::__construct();
    }

    public function handle(): void
    {
        DB::connection()->enableQueryLog();

        // Make sure all tables are truncated before we start the test.
        Acme::query()->truncate();
        Item::query()->truncate();
        DB::table('vdlp_acme_acme_item');

        $acme = Acme::create([
            'acme_id' => 2,
            'name' => 'Acme 2',
        ]);

        $item = Item::create([
            'item_id' => 4,
            'name' => 'Item 4',
        ]);

        $acme->items()->add($item, [
            'name' => 'Acme 2 - Item 4',
        ]);

        /*
         * Results in a "integrity constrant violation"-error:
         * SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'item_id' in where clause is ambiguous
         * (SQL: delete `vdlp_acme_acme_item` from `vdlp_acme_acme_item` inner join `vdlp_acme_items`
         * on `vdlp_acme_items`.`item_id` = `vdlp_acme_acme_item`.`item_id` where `acme_id` = 2 and `item_id` in (4))
         */
        $acme->items()->detach(4);

        $queries = DB::getQueryLog();

        dd($queries);
    }
}
