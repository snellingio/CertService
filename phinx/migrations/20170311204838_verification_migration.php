<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Phinx\Migration\AbstractMigration;

include __DIR__ . '/../../bootstrap/autoload.php';

class VerificationMigration extends AbstractMigration
{

    public function up()
    {
        Capsule::schema()->create('verifications', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->integer('domain_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('domain_id')->references('id')->on('domains');
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('verifications');
    }

}