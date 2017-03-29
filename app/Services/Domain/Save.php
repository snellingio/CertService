<?php
declare(strict_types=1);

namespace Service\Domain;

use AcmePhp\Ssl\Generator\KeyPairGenerator;
use Model;
use Ramsey\Uuid\Uuid;

class Save
{

    public function handle(string $domainName): Model\Domain
    {
        // @TODO: sanitize domain

        $domain = Model\Domain::where('name', $domainName)->first();

        if ($domain) {
            return $domain;
        }

        $pair       = (new KeyPairGenerator)->generateKeyPair();
        $publicKey  = $pair->getPublicKey();
        $privateKey = $pair->getPrivateKey();

        // @TODO: transaction store keys and domain
        $domain       = new Model\Domain;
        $domain->uuid = Uuid::uuid4();
        $domain->name = $domainName;
        $domain->save();

        $keypair            = new Model\KeyPair;
        $keypair->uuid      = Uuid::uuid4();
        $keypair->domain_id = $domain->id;
        $keypair->public    = $publicKey->getPEM();
        $keypair->private   = $privateKey->getPEM();
        $keypair->save();

        return $domain;
    }
}
