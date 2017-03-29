<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Phinx\Migration\AbstractMigration;

include __DIR__ . '/../../bootstrap/autoload.php';

class ConfigurationMigration extends AbstractMigration
{

    public function up()
    {
        Capsule::schema()->create('configuration', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->text('email')->unique();
            $table->text('public')->nullable();
            $table->text('private')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('configuration');
    }

}