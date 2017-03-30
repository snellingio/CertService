<?php
declare(strict_types=1);

namespace Service\Certificate;

use AcmePhp\Ssl;
use AcmePhp\Ssl\ParsedCertificate;
use Model\Certificate;
use Model\Domain;
use Ramsey\Uuid\Uuid;

class Save
{

    public function handle(ParsedCertificate $parsedCertificate, Domain $domain)
    {
        $issuerChain = array_map(function (Ssl\Certificate $certificate) {
            return $certificate->getPEM();
        }, $parsedCertificate->getSource()->getIssuerChain());

        $certificate                = new Certificate;
        $certificate->uuid          = Uuid::uuid4();
        $certificate->domain_id     = $domain->id;
        $certificate->valid_from    = $parsedCertificate->getValidFrom()->format('Y-m-d H:i:s');
        $certificate->valid_to      = $parsedCertificate->getValidTo()->format('Y-m-d H:i:s');
        $certificate->issuer        = $parsedCertificate->getIssuer();
        $certificate->issuerChain   = implode("\n", $issuerChain);
        $certificate->certificate   = $parsedCertificate->getSource()->getPEM();
        $certificate->serial_number = $parsedCertificate->getSerialNumber();
        $certificate->save();

        return $certificate;
    }
}
