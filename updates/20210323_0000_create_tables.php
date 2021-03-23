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
        // This example will not create foreign key relations.

        Schema::create('vdlp_acme_acmes', static function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('acme_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('vdlp_acme_items', static function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('item_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('vdlp_acme_acme_item', static function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('acme_id');
            $table->unsignedInteger('item_id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vdlp_acme_acme_item');
        Schema::dropIfExists('vdlp_acme_acmes');
        Schema::dropIfExists('vdlp_acme_items');
    }
}
