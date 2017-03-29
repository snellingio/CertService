<?php

use Service\Acme;
use Service\Certificate;
use Service\Challenge;
use Service\Domain;

class ServiceTest extends \PHPUnit_Framework_TestCase
{

    public function testCertificateRequest()
    {
        // @TODO: make sure domain doesn't exist
        /*
Store verifications in database. Rename to checks? Check Log?

Start thinking about what should be encrypted.

Think about making configuration entry hold the directory

Think about allowing multiple emails register in a directory, multiple configurations

Check valid until logic, allow force reissue, but don't reissue by default

Start on API for internal use, probably json only to start with

think about dashboard?
         */

        $acme      = (new Acme\Client)->handle();

        // Create Domain
        $domain    = (new Domain\Save)->handle('74b31ecb.ngrok.io');

        // Request Challenge
        $challenge = (new Challenge\Authorize)->handle($acme, $domain);

        // Validate Challenge
        $validated = (new Challenge\Check)->handle($acme, $challenge);

        if ($validated) {
            // Register it!
            $parsedCertificate = (new Certificate\Request)->handle($acme, $domain);
            $certificate       = (new Certificate\Save)->handle($parsedCertificate, $domain);

            // Renew it!
            $parsedCertificate = (new Certificate\Request)->handle($acme, $domain);
            $certificate       = (new Certificate\Save)->handle($parsedCertificate, $domain);
        }
    }
}
