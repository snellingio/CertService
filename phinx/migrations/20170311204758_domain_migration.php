<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Phinx\Migration\AbstractMigration;

include __DIR__ . '/../../bootstrap/autoload.php';

class DomainMigration extends AbstractMigration
{

    public function up()
    {
        Capsule::schema()->create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->text('name')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('domains');
    }

}