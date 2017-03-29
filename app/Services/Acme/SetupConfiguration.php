<?php
declare(strict_types=1);

namespace Service\Acme;

use AcmePhp\Ssl\Generator\KeyPairGenerator;
use Container;
use Model;
use Ramsey\Uuid\Uuid;

class SetupConfiguration
{

    public function handle(): Model\Configuration
    {
        $email         = Container::get('ACME_EMAIL');
        $configuration = Model\Configuration::where('email', $email)->first();

        if ($configuration) {
            return $configuration;
        }

        $email      = Container::get('ACME_EMAIL');
        $keys       = (new KeyPairGenerator)->generateKeyPair();
        $publicKey  = $keys->getPublicKey();
        $privateKey = $keys->getPrivateKey();

        $configuration          = new Model\Configuration;
        $configuration->uuid    = Uuid::uuid4();
        $configuration->email   = $email;
        $configuration->public  = $publicKey->getPEM();
        $configuration->private = $privateKey->getPEM();
        $configuration->save();

        (new Register)->handle($email);

        return $configuration;
    }
}
