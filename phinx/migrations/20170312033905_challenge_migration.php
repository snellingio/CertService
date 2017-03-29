<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Phinx\Migration\AbstractMigration;

include __DIR__ . '/../../bootstrap/autoload.php';

class ChallengeMigration extends AbstractMigration
{

    public function up()
    {
        Capsule::schema()->create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->integer('domain_id');
            $table->text('type')->nullable();
            $table->text('url')->nullable();
            $table->text('token')->nullable();
            $table->text('payload')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('domain_id')->references('id')->on('domains');
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('challenges');
    }

}