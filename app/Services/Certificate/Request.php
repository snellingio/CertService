<?php
declare(strict_types=1);

namespace Service\Certificate;

use AcmePhp\Core\AcmeClient;
use AcmePhp\Ssl\CertificateRequest;
use AcmePhp\Ssl\DistinguishedName;
use AcmePhp\Ssl\KeyPair;
use AcmePhp\Ssl\ParsedCertificate;
use AcmePhp\Ssl\Parser\CertificateParser;
use AcmePhp\Ssl\PrivateKey;
use AcmePhp\Ssl\PublicKey;
use Model\Domain;

class Request
{

    public function handle(AcmeClient $acme, Domain $domain)
    {
        $certificates = $acme->requestCertificate(
            $domain->name,
            new CertificateRequest(
                new DistinguishedName($domain->name),
                new KeyPair(
                    new PublicKey($domain->keypair->public),
                    new PrivateKey($domain->keypair->private)
                )
            )
        );

        $parsedCertificate = (new CertificateParser())->parse($certificates->getCertificate());

        return $parsedCertificate;
    }
}
