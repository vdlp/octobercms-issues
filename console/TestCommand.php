<?php

declare(strict_types=1);

namespace Vdlp\Acme\Console;

use Illuminate\Console\Command;
use System\Models\File;
use Vdlp\Acme\Models\Acme;

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
        $identifier = $this->createExample();

        $this->loadExample($identifier);
    }

    private function createExample(): int
    {
        // Create a new Acme model

        $acme = Acme::create([
            'name' => 'my acme',
        ]);

        // Create a new File model

        $file = new File();
        $file->fromUrl('https://www.vdlp.nl/storage/app/media/technologie/letsmanage10.jpg', 'somefilename.jpg');

        // Get the key

        var_dump($acme->getKey()); // This will output: int(1)

        // Attach the File model to Acme model

        $acme->attachment()->add($file);

        // Get the key

        var_dump($acme->getKey()); // This will output: string(1) "1"

        return (int) $acme->getKey();
    }

    private function loadExample(int $identifier): void
    {
        $newAcme = Acme::query()->findOrFail($identifier);

        var_dump($newAcme->getKeyType()); // string(3) "int"

        $newAcme->attachment;

        var_dump($newAcme->getKeyType()); // string(6) "string"
    }
}
