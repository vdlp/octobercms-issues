<?php

declare(strict_types=1);

namespace Vdlp\Acme\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

final class CreateAcmesTable extends Migration
{
    public function up(): void
    {
        Schema::create('vdlp_acme_acmes', static function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vdlp_acme_acmes');
    }
}
