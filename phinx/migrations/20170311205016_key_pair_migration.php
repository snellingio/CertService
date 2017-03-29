<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Phinx\Migration\AbstractMigration;

include __DIR__ . '/../../bootstrap/autoload.php';

class KeyPairMigration extends AbstractMigration
{

    public function up()
    {
        Capsule::schema()->create('keypairs', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->integer('domain_id');
            $table->text('public')->nullable();
            $table->text('private')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('domain_id')->references('id')->on('domains');
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('keypairs');
    }

}