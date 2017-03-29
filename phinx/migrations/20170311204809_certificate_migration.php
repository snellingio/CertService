<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Phinx\Migration\AbstractMigration;

include __DIR__ . '/../../bootstrap/autoload.php';

class CertificateMigration extends AbstractMigration
{

    public function up()
    {
        Capsule::schema()->create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->integer('domain_id');
            $table->dateTime('valid_from')->nullable();
            $table->dateTime('valid_to')->nullable();
            $table->text('issuer')->nullable();
            $table->text('certificate')->nullable();
            $table->text('issuerChain')->nullable();
            $table->text('serial_number')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('domain_id')->references('id')->on('domains');
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('certificates');
    }

}