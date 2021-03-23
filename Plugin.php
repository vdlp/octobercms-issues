<?php

declare(strict_types=1);

namespace Vdlp\Acme;

use System\Classes\PluginBase;
use Vdlp\Acme\Console\TestCommand;

final class Plugin extends PluginBase
{
    public function pluginDetails(): array
    {
        return [
            'name' => 'Acme',
            'description' => '',
            'author' => 'Van der Let & Partners',
            'icon' => 'icon-leaf',
        ];
    }

    public function register(): void
    {
        $this->registerConsoleCommand(TestCommand::class, TestCommand::class);
    }
}
